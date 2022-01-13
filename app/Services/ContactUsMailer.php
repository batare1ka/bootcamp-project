<?php 
namespace App\Services;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Psr\Log\LoggerInterface;

class ContactUsMailer{

    private Mailer $infrastructureMailer;
    private LoggerInterface $logger;

    public function __construct(Mailer $infrastructureMailer, LoggerInterface $logger){
        $this->infrastructureMailer = $infrastructureMailer;
        $this->logger = $logger;
    }
    public function send( array $data): void {
        $this->infrastructureMailer->send(
            "emails.contactUs",
            [
                'name' => $data['name'],
                'email'=> $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'region' => $data['region'],
                'messageText'=> $data['message']

            ], 
            function (Message $message) use ($data){
                $message->subject('Contact Us requested from ' . $data['email']);
                $message->from($data['email'], $data['name']);
                $message->to('e-commerce@clokids.app');
            });
        $this->logger->info("Contact Us mail send to e-commerce@clokids.app");
    }
}