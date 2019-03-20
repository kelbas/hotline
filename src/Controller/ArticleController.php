<?php
/**
 * Created by PhpStorm.
 * User: kelba_000
 * Date: 03/20/2019
 * Time: 17:08
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('OMG!');
    }

    /**
     * @Route("/auto")
     */
    public function addAuto()
    {
        $json = file_get_contents('https://hotline.finance/api/autoloans?');
        $data = json_decode($json, true);
       
        return new JsonResponse($data);
    }

    /**
     * @Route("/auto/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Help: %s',
            $slug
        ));
    }
}