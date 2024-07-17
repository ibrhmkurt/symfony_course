<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class MessageGenerator
{
    /**
     * @var NameGenarator
     */
    private $nameGenerator;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var string
     */
    private $adminEmail;

    public function __construct(NameGenerator $nameGenerator, RequestStack $requestStack, $adminEmail)
    {
        $this->nameGenerator = $nameGenerator;
        $this->requestStack = $requestStack;
        $this->adminEmail = $adminEmail;
    }

    public function helloMessage()
    {
        // --->> /hello?name=(write a name)
        $name = $this->requestStack->getCurrentRequest()->get('name');
        
        if(empty($name))
        {
            $name = $this->nameGenerator->randomName();
        }
        $message = 'Hello '.$name.'! --> admin e-mail: '.$this->adminEmail;

        return $message;
    }
}