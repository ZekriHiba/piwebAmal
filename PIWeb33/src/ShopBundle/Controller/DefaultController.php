<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ShopBundle:Default:index.html.twig');
    }



    public function PayerAction(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_73RHI91LtuRlMJQlmYtGp1sB');
        $prix=$request->get('prixTotal');
         \Stripe\Charge::create(

            array(

                'amount' => $prix*100,

                'currency' => 'eur',

                'source' => 'tok_mastercard',

                'description' => 'Payement pour hiba'

            ));

        return $this->redirectToRoute('_show_line');
    }

}
