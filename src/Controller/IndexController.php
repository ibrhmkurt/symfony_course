<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return new JsonResponse(['message' => 'Merhaba Dünya!']);
    }

    /**
     * @Route("/request", name="request_test")
     * @param RequestStack $requestStack
     */
    public function requestTest(RequestStack $requesStack): Response
    {
        $request = $requesStack->getCurrentRequest();

        // $_POST 
        $name = $request->request->get('name');

        // $_GET
        $request->query->get('name');

        // $_COOKİE
        $request->cookies->get('username');

        // php de karşılığı yok
        $request->attributes->get('name');

        // $_FILE
        $request->files->get('filename');

        // $_SERVER
        $serverData = $request->server->all();

        var_dump($serverData);exit();
    }
}
