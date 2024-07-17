<?php

namespace App\Service;

class MessageGenerator
{
    /**
     * @var NameGenarator
     */

    private $nameGenerator;

    public function __construct(NameGenerator $nameGenerator)
    {
        $this->nameGenerator = $nameGenerator;
    }

    public function helloMessage()
    {
        $message = 'Hello '.$this->nameGenerator->randomName().'!';

        return $message;
    }
}