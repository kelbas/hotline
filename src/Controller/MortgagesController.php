<?php

namespace App\Controller;

use App\Entity\Mortgages;
use App\Entity\Rates;
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
        $this->rates();

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

    public function rates()
    {
        echo '<pre>';
        $json = file_get_contents('https://hotline.finance/api/mortgages?');
        $data = json_decode($json); /*true*/

        for ($i = 0; $i < count($data->rates->items); $i++){
            $em = $this->getDoctrine()->getManager();
            $rates = new Rates();

            $rates->setCreditId($data->rates->items[$i]->credit);
            $rates->setUsd($data->rates->items[$i]->usd);
            $rates->setUah($data->rates->items[$i]->uah);
            $rates->setEur($data->rates->items[$i]->eur);
            $rates->setPeriod($data->rates->items[$i]->period);

            $em->persist($rates);

            $em->flush();
        }
    }
}
