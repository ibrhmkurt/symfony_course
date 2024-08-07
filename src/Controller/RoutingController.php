<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
     * @Route("/posts-listing/{page<\d+>?2}", name="new-post-list")
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


    /**
     * @Route("/generate-url")
     */
    public function geUrl()
    {
        $url = $this->generateUrl('app_routing_geurl', [
            '_locale' => 'en',
            '_format' => 'html',
            'year' => 1994,
            'slug' => 'kaliteli-hizmet-nasıl-verilir'
        ]);
        return new JsonResponse(['url' => $url]);   
    }   

     /**
     * @Route("/generate-url-service")
     */
    public function geUrl2(UrlGeneratorInterface $router)
    {
        $url = $router->generate('app_routing_geurl2', [
            '_locale' => 'en',
            '_format' => 'html',
            'year' => 1994,
            'slug' => 'kaliteli-hizmet-nasıl-verilir-yeni-version'
        ]);
        return new JsonResponse(['url' => $url]);   
    }

      /**
     * @Route("/generate-url-example")
     */
    public function geUrl3()
    {
        $url = $this->generateUrl('new-post-list', [
            'page' => 19,
            'category' => 'health',
            'age' => 30
        ]);

        $fullUrl = $this->generateUrl('new-post-list', [
            'page' => 19,
            'category' => 'health',
            'age' => 30
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse(['url' => $url, 'fullUrl' => $fullUrl]);   
    }
}
