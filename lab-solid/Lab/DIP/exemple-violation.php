<?php

declare(strict_types=1);

class Courriel
{
    public function envoyer(string $message): string
    {
        return 'Courriel : ' . $message;
    }
}

class ServiceNotification
{
    public function notifier(string $message): string
    {
        $canal = new Courriel();
        return $canal->envoyer($message);
    }
}

echo (new ServiceNotification())->notifier('Discipline ajoutée') . PHP_EOL;
