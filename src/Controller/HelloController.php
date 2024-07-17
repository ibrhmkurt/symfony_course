<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @Route("/hello", name="hello")
     * @return Response
     */
    public function hello()
    {
        $messageGenerator = $this->container->get(MessageGenerator::class);
        return new Response($messageGenerator->helloMessage());
    }
}