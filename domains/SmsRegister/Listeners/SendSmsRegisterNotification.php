<?php

namespace Domains\SmsRegister\Listeners;

use Carbon\Carbon;
use Domains\SmsRegister\Events\SmsRegisterEvent;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class SendSmsRegisterNotification
{

    /**
     * Handle the event.
     *
     * @param  SmsRegisterEvent $event
     * @return void
     */
    public function handle(SmsRegisterEvent $event)
    {
        try{
            $sendMessageUrl = "https://xcp.fanap.plus/api/v6.0/message/post";
            $jsonToSend = $this->makeRequestBody($event);
            $this->sendNotification($jsonToSend, $sendMessageUrl);
            return;
        }catch (\Exception $exception){
            // TODO add log
        }

    }

    /**
     * @param SmsRegisterEvent $event
     * @return array
     */
    protected function makeRequestBody(SmsRegisterEvent $event): array
    {
        $content = $event->smsRegisterDTO->getContent();
        $uid = (string)Str::uuid();
        $dateMessage = Carbon::now()->format('Y-m-d\TH:i:s.v\Z');
        $channelType = $event->smsRegisterDTO->getChannelType();
        $sid = ($channelType == "Imi") ? "1785317599f444449e550e7c93956de6": "d770e9d862ff45bdafbe22bfa2b389c3";
        $messageType = "Content";
        $mobileNumber = $event->smsRegisterDTO->getMobileNumber();
        $appId = '94852FB1-27EC-48D2-80D6-5167AA452BD4';
        $signatureMessage = $dateMessage . "," . $uid . "," . $sid . "," . $channelType . "," . $messageType . "," . $mobileNumber . "," . $content;
        openssl_sign(
            $signatureMessage,
            $signature,
            openssl_pkey_get_private(config('smsRegister.privateKey')),
            OPENSSL_ALGO_SHA1);
        $jsonToSend = [
            'Uid'      => $uid,
            'Date'     => $dateMessage,
            'AppId'    => $appId,
            'Messages' => [
                [
                    'Sid'             => $sid,
                    'UserPhoneNumber' => $mobileNumber,
                    'Content'         => $content,
                    'MessageType'     => $messageType,
                    'ChannelType'     => $channelType,
                    'Priority'        => "High",
                    'ReplyTo'         => "",
                    'ExpirationTime'  => "",
                    'Signature'       => base64_encode($signature)
                ]
            ],
        ];
        return $jsonToSend;
    }

    private function sendNotification(array $jsonToSend, string $sendMessageUrl)
    {

        $client = new Client();
        $headers = [
            'content-type' => 'application/json; charset=utf-8',
        ];
        $response = $client->request(
            'POST',
            $sendMessageUrl,
            [
                "headers" => $headers,
                "json"    => $jsonToSend
            ]);
        if($response->getStatusCode()==Response::HTTP_OK){
            return;
        }else{
            // TODO add log
        }
    }

}
