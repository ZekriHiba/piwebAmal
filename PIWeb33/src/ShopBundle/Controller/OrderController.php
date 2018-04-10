<?php

namespace ShopBundle\Controller;

use Proxies\__CG__\UserBundle\Entity\User;
use ShopBundle\Entity\Commande;
use ShopBundle\Entity\Order;
use ShopBundle\Entity\test;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OrderController extends Controller
{

    public function AddOrderAction()
    {
        $em=$this->getDoctrine()->getManager();
        $lines=$em->getRepository(test::class)->showCart(0);

        $p=0;
        foreach ($lines as $line)
        {
            $total=$line->getQuantity()*$line->getPrice();
            $p=$p+$total;
            var_dump($p);

        }
        var_dump($p);




        $o=new Commande();



        $o->setPrice($p);
        $o->setIduser(1);
       $o->setDate(new \DateTime());


            $em->persist($o);
            $em->flush();



        foreach ($lines as $line)
        {
            $line->setOrderId($o->getId());
            $em->flush();
        }

    // return $this->redirectToRoute('_show_line');

        return $this->render('ShopBundle:Order:Payment.html.twig', array(
            'prixTotal'=>$p
        ));

    }


}
