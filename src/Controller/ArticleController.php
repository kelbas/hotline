<?php

namespace App\Controller;

use App\Repository\AutoRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Auto;

class ArticleController extends FOSRestController
{
    /**
     * @Rest\Get("/")
     */
    public function getAction()
    {
        $product = $this->getDoctrine()
            ->getRepository(Auto::class)->testic();

        //var_dump($product);

        return new JsonResponse($product);
    }

}