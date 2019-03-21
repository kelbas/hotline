<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Auto;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index()
    {
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
}
