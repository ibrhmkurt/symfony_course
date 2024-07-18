<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RoutingController extends AbstractController
{
    /**
     * @Route({
     *          "en": "/about",
     *          "tr": "/hakkinda"
     * }, name="about")
     */
    public function about(): Response
    {
        return new JsonResponse(['message' => 'About Page']);
    }

    /**
     * @Route("/list/{page}", name="blog_list")
     */
    public function post_list($page)
    {
        return new Response("Page: ".$page);
    }
}
