<?php

namespace AdoptionBundle\Controller;

use AdoptionBundle\Entity\testAdoption;
use BaseBundle\Entity\Animal;
use BaseBundle\Entity\wishlistAdoption;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WishlistAdoptionController extends Controller
{
    public function AddWishlistAction($id)
    {
        $animal=$this->getDoctrine()->getRepository(Animal::class)->find($id);
        $w=$this->getDoctrine()->getRepository(testAdoption::class)->wish($id,$this->getUser()->getId());
        if ($w==null)
        { $wish=new wishlistAdoption();
        $wish->setUserId($this->getUser());
        $wish->setAnimalId($animal);
        $m=$this->getDoctrine()->getManager();
        $m->persist($wish);
        $m->flush();}
        return $this->redirectToRoute('_show_wishlist');

    }

    public function DeleteWishlistAction($id)
    {
        $m=$this->getDoctrine()->getManager();
        $w=$this->getDoctrine()->getRepository(testAdoption::class)->wish($id,$this->getUser()->getId());
        if($w!=null)
        {$m->remove($w[0]);
            $m->flush();}
        return $this->redirectToRoute('_show_wishlist');
    }

    public function ShowWishlistAction()
    {
        $m=$this->getDoctrine()->getRepository(wishlistAdoption::class);
        $wishes=$m->findByUserId($this->getUser()->getId());
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $adoptions=$em->lastzanimo();
        return $this->render('AdoptionBundle:WishlistAdoption:show_wishlist.html.twig', array(
           'wishes'=>$wishes,'adoptions'=>$adoptions
        ));
    }

}
