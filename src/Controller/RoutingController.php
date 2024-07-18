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
     * @Route("/blog/{page}", name="page_number", requirements={"page"="\d+"})
     */
    public function postList($page)
    {
        return new Response("Page: ".$page);
    }

    /**
     * @Route("/blog/{postSlug}", name="post_slug")
     */
    public function listWithSlug($postSlug)
    {
        return new Response("Page Slug: ".$postSlug);
    }
}
