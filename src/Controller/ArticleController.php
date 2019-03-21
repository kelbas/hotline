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
        $json = file_get_contents('https://hotline.finance/api/autoloans?');
        $data = json_decode($json, true);
        echo '<pre>';
        foreach ($data as $kay => $data2){
            foreach($data2['items'] as $kay => $value){
                var_dump($value);
            }
        }

        //return new JsonResponse($data);
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