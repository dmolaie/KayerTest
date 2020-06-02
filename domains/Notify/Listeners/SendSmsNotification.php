<?php

namespace Domains\Notify\Listeners;

use Carbon\Carbon;
use Domains\Notify\Events\SendSmsEvent;
use Domains\SmsRegister\Events\TemporalLogEvent;
use Domains\SmsRegister\Services\Contracts\DTOs\TemporalLogDTO;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class SendSmsNotification
{

    /**
     * Handle the event.
     *
     * @param  sendSmsEvent $event
     * @return void
     */
    public function handle(sendSmsEvent $event)
    {
        try {
        $sendMessageUrl = config('notify.sendMessageUrl');
        foreach ($event->sendSmsDTO->getChannelTypes() as $channelType) {
            $jsonToSend = $this->makeRequestBody($event, $channelType);
            $this->sendNotification($jsonToSend, $sendMessageUrl);
            return;
        }
        } catch (\Exception $exception) {
            $this->addLog('INTERNAL SERVER ERROR', [
                $exception->getMessage()
            ]);
        }

    }

    /**
     * @param sendSmsEvent $event
     * @param string $channelType
     * @return array
     */
    protected function makeRequestBody(SendSmsEvent $event, string $channelType): array
    {
        $content = $event->sendSmsDTO->getContent();
        $uid = (string)Str::uuid();
        $dateMessage = Carbon::now()->format('Y-m-d\TH:i:s.v\Z');
        $sid = ($channelType == "Imi") ? config('notify.ImiSid') : config('notify.MtnSid');
        $messageType = ($channelType == "Imi") ? "Content" : "PremiumContent";
        $mobileNumber = $event->sendSmsDTO->getMobileNumber();
        $appId = config('notify.appId');
        $signatureMessage = $dateMessage . "," . $uid . "," . $sid . "," . $channelType . "," . $messageType . "," . $mobileNumber . "," . $content;
        openssl_sign(
            $signatureMessage,
            $signature,
            openssl_pkey_get_private(config('notify.privateKey')),
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
        if ($response->getStatusCode() == Response::HTTP_OK) {
            $this->addLog('sendSmsNotify succeed', [
                $response->getStatusCode(),
                $jsonToSend,
                $response->getBody()
            ]);
            return;
        } else {
            $this->addLog('curl fail sendSmsNotify', [
                $response->getStatusCode(),
                $jsonToSend,
                $response->getBody()
            ]);
        }
    }

    /**
     * @param $title
     * @param array $data
     */
    protected function addLog($title, $data = []): void
    {

        $temporalLog = new TemporalLogDTO();
        $temporalLog->setLogTitle($title)
            ->setLogData($data);
        event(new TemporalLogEvent($temporalLog));
        return;
    }

}
