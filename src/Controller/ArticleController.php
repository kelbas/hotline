<?php

namespace App\Controller;

use App\Repository\AutoRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Auto;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends FOSRestController
{
    /**
     * @Rest\Get("/")
     */
    public function getAction()
    {
        $product = $this->getDoctrine()
            ->getRepository(Auto::class)->testic();

        //var_dump($product['rates']);

       return new JsonResponse($product);
    }

    /**
     * @Rest\Get("/rates")
     */
    public function ratesAction()
    {
        $test = $this->getDoctrine()->getRepository(Auto::class)->findAllAuto();

       // var_dump($test);

        return new JsonResponse($test);
    }

}