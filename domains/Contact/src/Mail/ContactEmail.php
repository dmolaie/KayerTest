<?php

namespace Domains\Contact\Mail;

use Domains\Contact\Services\Contracts\DTOs\ContactCreateDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $createContactCreateDTO;

    /**
     * Create a new message instance.
     *
     * @param ContactCreateDTO $createContactCreateDTO
     */
    public function __construct(ContactCreateDTO $createContactCreateDTO)
    {
        $this->createContactCreateDTO = $createContactCreateDTO;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->createContactCreateDTO;
        $sendTo = config('contact.contactEmails.' . $data->getType()) ?? config('contact.contactEmails.contact_us');
        return $this->to($sendTo)
            ->from(config('contact.contactEmails.contact_us'))
            ->subject($data->getTitle())
            ->markdown('contact::emails.contact', compact('data'));
    }
}
