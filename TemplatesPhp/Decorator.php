<?php

interface Notifier
{
    public function send(string $message): string;
}


abstract class NotifierDecorator implements Notifier
{
    private Notifier $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public function send(string $message): string
    {
        return $this->notifier->send($message);
    }
}

class NonNotification implements Notifier
{
    public function send(string $message): string
    {
       return $message . PHP_EOL;
    }
}

class SmsNotification extends NotifierDecorator
{
    public function send(string $message): string
    {
        $message = parent::send($message);
        return "Sms notification: $message";
    }
}

class EmailNotification extends NotifierDecorator
{
    public function send(string $message): string
    {
        $message = parent::send($message);
        return "Email notification: $message";
    }
}

class CNNotification extends NotifierDecorator
{
    public function send(string $message): string
    {
        $message = parent::send($message);
        return "CN notification: $message";
    }
}

$message = 'Hello world';

$nonNotification = new NonNotification();

$smsNotification = new SmsNotification($nonNotification);
$emailNotification = new EmailNotification($nonNotification);
$cnNotification = new CNNotification($nonNotification);

echo $smsNotification->send($message);
echo $emailNotification->send($message);
echo $cnNotification->send($message);

