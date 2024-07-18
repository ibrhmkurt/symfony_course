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

     /**
     * @Route("/posts/{page}", name="post_listing", requirements={"page"="\d+"})
     */
    public function postListing($page = 1)
    {
        return new JsonResponse(['message' => $page]);
    }

    /**
     * @Route("/posts-listing/{page<\d+>?2}")
     */
    public function postListing2($page)
    {
        return new JsonResponse(['message' => $page]);
    }

    /**
     * @Route(
     *      "/articles/{_locale}/{year}/{slug}.{_format}",
     *      defaults={"_format": "html"},
     *      requirements={
     *          "_locale": "en|tr",
     *          "_format": "html|json",
     *          "year": "\d+"
     * }
     * )
     * @return JsonResponse
     */
    public function showArticle($_locale, $year, $slug, $_format)
    {
        return new JsonResponse(['message' => implode("--",[$_locale, $year, $slug, $_format])]);
    }
}
