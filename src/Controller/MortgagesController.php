<?php

namespace App\Controller;

use App\Entity\Mortgages;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class MortgagesController extends AbstractController
{
    /**
     * @Route("/mortgages", name="mortgages")
     */
    public function index()
    {
        $json = file_get_contents('https://hotline.finance/api/mortgages?');
        $data = json_decode($json); /*true*/

        for ($i = 0; $i < count($data->credits->items); $i++){
            $em = $this->getDoctrine()->getManager();
            $mortgages = new Mortgages();
            $data->credits->items[$i]->id;
            $mortgages->setCreditId($data->credits->items[$i]->id);
            $mortgages->setUri($data->credits->items[$i]->uri);
            $mortgages->setTitle($data->credits->items[$i]->title);
            $mortgages->setSlug($data->credits->items[$i]->slug);
            $mortgages->setCommission($data->credits->items[$i]->comission);
            $mortgages->setPayment($data->credits->items[$i]->payment);
            $mortgages->setSumFrom($data->credits->items[$i]->sumFrom);
            $mortgages->setSumTo($data->credits->items[$i]->sumTo);
            $mortgages->setEarlyRepayment($data->credits->items[$i]->earlyRepayment);
            $mortgages->setMonthlyCommission($data->credits->items[$i]->monthly_comission);
            $mortgages->setRemoteOfferLink($data->credits->items[$i]->remote_offer_link);
            $mortgages->setAge($data->credits->items[$i]->age);
            $mortgages->setReference($data->credits->items[$i]->reference);
            $mortgages->setBank($data->credits->items[$i]->bank);

            $em->persist($mortgages);


            $em->flush();
        }

        return new Response('Saved new product with id '.$mortgages->getId());
    }
}
