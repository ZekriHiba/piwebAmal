<?php

namespace AdoptionBundle\Controller;

use BaseBundle\Entity\SSpecies;
use Proxies\__CG__\BaseBundle\Entity\Species;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SpeciesController extends Controller
{
    public function ReadAction()
    {
        return $this->render('AdoptionBundle:Species:read.html.twig', array(
            // ...
        ));
    }

    public function CreateSpeciesAction(Request $request)
    {
        $name = $request->get('field');
        $cat=$this->getDoctrine()->getRepository(Species::class)->findByName($name);
        $y=null;
        foreach ($cat as $c)
        {
            if($c==null){ $x=false;
                $y=$x;}
            else{$x=true;
                $y=$x;}
        }
        if($request->isXmlHttpRequest() && $x==false) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($cat);
            return new JsonResponse($data);
        }

        $species=new Species();
        $sspecies=new SSpecies();
        $species->setName($request->request->get('field'));
        $sspecies->setSpeciesId($species);
        $sspecies->setName($request->request->get('nom'));
        if(isset($_POST['save']) && $y==false )
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($species);
            $em->persist($sspecies);
            $em->flush();
        }
        if(isset($_POST['edit']))
        {
            $species1=$this->getDoctrine()->getRepository(Species::class)->findByName($name);
            if(sizeof($species1)==1)
            {
                $sspecies->setSpeciesId($species1[0]);
                $sspecies->setName($request->request->get('nom2'));
                $em=$this->getDoctrine()->getManager();
                $em->persist($sspecies);
                $em->flush();
            }
        }
        $catg=$this->getDoctrine()->getRepository(Species::class)->findAll();
        $scatg=$this->getDoctrine()->getRepository(SSpecies::class)->findAll();
        return $this->render('AdoptionBundle:Species:create_species.html.twig', array(
           'catg'=>$catg,'scatg'=>$scatg
        ));
    }

    public function CreateSubSpeciesAction()
    {
        return $this->render('AdoptionBundle:Species:create_sub_species.html.twig', array(
            // ...
        ));
    }

    public function deleteSpeciesAction($id)
    {
        $m=$this->getDoctrine()->getManager();
        $species=$m->getRepository(Species::class)->find($id);
        $sspecies=$m->getRepository(SSpecies::class)->findBySpeciesId($id);
        if($species!=null)
        {$m->remove($species);
            $m->flush();}
        if($sspecies!=null)
        { foreach ($sspecies as $s)
            {$m->remove($s);
            $m->flush();}}
        return $this->redirectToRoute('_create_species');
    }

    public function UpdateSubSpeciesAction()
    {
        return $this->render('AdoptionBundle:Species:update_sub_species.html.twig', array(
            // ...
        ));
    }

    public function DeleteSubSpeciesAction($id)
    {
        $m=$this->getDoctrine()->getManager();
        $sspecies=$m->getRepository(SSpecies::class)->find($id);
        $id=$m->getRepository(SSpecies::class)->findBySpeciesId($sspecies->getSpeciesId()->getSpeciesId());
        $species=$m->getRepository(Species::class)->findBySpeciesId($sspecies->getSpeciesId()->getSpeciesId());
        if(sizeof($id)==1)
        { foreach ($id as $s)
        {$m->remove($s);
        $m->remove($species[0]);
            $m->flush();
        }}
        else{$m->remove($sspecies);
            $m->flush();}
        return $this->redirectToRoute('_create_species');

    }

}
