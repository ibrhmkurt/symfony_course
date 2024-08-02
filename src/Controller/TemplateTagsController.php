<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateTagsController extends AbstractController
{
    /**
     * @Route("/template-tags", name="template_tags")
     */
    public function index(): Response
    {
        return $this->render('template_tags/index.html.twig', [
            'controller_name' => 'TemplateTagsController',
            'cities' => [
                'Ankara',
                'İstanbul',
                'Eskişehir',
                'Muğla'
            ],
            'ifVar' => true,
            'definedCheck' => 'behram',
            'emptyCheck' => false,
            'nullCheck' => null,
            'iterableCheck' => ['hakem', 'tuna']
        ]);
    }
}
