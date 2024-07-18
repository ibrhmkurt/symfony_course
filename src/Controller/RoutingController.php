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
     * @Route("/blog-list/{page<\d+>}", name="page_number",)
     */
    public function blogList($page)
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

    /**
     * @Route("/routing/hello/{_locale}", defaults={"_locale"="tr"}, requirements={"_locale"="en|tr"})
     */
    public function helloRouting($_locale)
    {
        return new Response("Locale is : ".$_locale);
    }

    /**
     * @Route("/api/posts/{id}", methods={"GET", "HEAD"})
     */
    public function showPost($id)
    {
        return new JsonResponse(['message' => $id]);
    }
}
