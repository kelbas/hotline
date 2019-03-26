<?php

namespace App\Controller;

use App\Entity\Rates;
use App\Entity\Auto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index()
    {
        $this->rates();

        $json = file_get_contents('https://hotline.finance/api/autoloans?');
        $data = json_decode($json); /*true*/

            for ($i = 0; $i < count($data->credits->items); $i++){
                $em = $this->getDoctrine()->getManager();
                $auto = new Auto();
                $data->credits->items[$i]->id;
                $auto->setCreditId($data->credits->items[$i]->id);
                $auto->setUri($data->credits->items[$i]->uri);
                $auto->setTitle($data->credits->items[$i]->title);
                $auto->setSlug($data->credits->items[$i]->slug);
                $auto->setCommission($data->credits->items[$i]->comission);
                $auto->setPayment($data->credits->items[$i]->payment);
                $auto->setSumFrom($data->credits->items[$i]->sumFrom);
                $auto->setSumTo($data->credits->items[$i]->sumTo);
                $auto->setEarlyRepayment($data->credits->items[$i]->earlyRepayment);
                $auto->setMonthlyCommission($data->credits->items[$i]->monthly_comission);
                $auto->setRemoteOfferLink($data->credits->items[$i]->remote_offer_link);
                $auto->setAge($data->credits->items[$i]->age);
                $auto->setReference($data->credits->items[$i]->reference);
                $auto->setBank($data->credits->items[$i]->bank);

                $em->persist($auto);


                $em->flush();
            }

        return new Response('Saved new product with id '.$auto->getId());
    }

    public function rates()
    {
        echo '<pre>';
        $json = file_get_contents('https://hotline.finance/api/autoloans?');
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
