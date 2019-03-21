<?php

namespace App\Controller;

use App\Entity\Consumerloans;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ConsumerloansController extends AbstractController
{
    /**
     * @Route("/consumerloans", name="consumerloans")
     */
    public function index()
    {
        $json = file_get_contents('https://hotline.finance/api/consumerloans?');
        $data = json_decode($json); /*true*/

        for ($i = 0; $i < count($data->credits->items); $i++){
            $em = $this->getDoctrine()->getManager();
            $consumerloans = new Consumerloans();
            $data->credits->items[$i]->id;
            $consumerloans->setCreditId($data->credits->items[$i]->id);
            $consumerloans->setUri($data->credits->items[$i]->uri);
            $consumerloans->setTitle($data->credits->items[$i]->title);
            $consumerloans->setSlug($data->credits->items[$i]->slug);
            $consumerloans->setCommission($data->credits->items[$i]->comission);
            $consumerloans->setPayment($data->credits->items[$i]->payment);
            $consumerloans->setSumFrom($data->credits->items[$i]->sumFrom);
            $consumerloans->setSumTo($data->credits->items[$i]->sumTo);
            $consumerloans->setEarlyRepayment($data->credits->items[$i]->earlyRepayment);
            $consumerloans->setMonthlyCommission($data->credits->items[$i]->monthly_comission);
            $consumerloans->setRemoteOfferLink($data->credits->items[$i]->remote_offer_link);
            $consumerloans->setAge($data->credits->items[$i]->age);
            $consumerloans->setReference($data->credits->items[$i]->reference);
            $consumerloans->setBank($data->credits->items[$i]->bank);

            $em->persist($consumerloans);


            $em->flush();
        }

        return new Response('Saved new product with id '.$consumerloans->getId());
    }
}
