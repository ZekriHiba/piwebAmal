<?php

namespace AdoptionBundle\Controller;

use AdoptionBundle\Entity\testAdoption;
use BaseBundle\Entity\Animal;
use BaseBundle\Entity\RequestAdoption;
use BaseBundle\Entity\Users;
use BaseBundle\Entity\wishlistAdoption;
use Doctrine\DBAL\Types\IntegerType;
use Proxies\__CG__\BaseBundle\Entity\Adoption;
use Proxies\__CG__\BaseBundle\Entity\Species;
use Proxies\__CG__\BaseBundle\Entity\SSpecies;
use ShopBundle\Entity\test;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UserBundle\Entity\User;
use AdoptionBundle\Controller\DefaultController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

class AdoptionController extends Controller
{
    public function CreateAdoptionAction(Request $request)
    {
        $catg=$this->getDoctrine()->getRepository(Species::class)->findAll();
        $name = $request->get('opt');
        $id=$this->getDoctrine()->getRepository(Species::class)->findByName($name);

        $catgN=$this->getDoctrine()->getRepository(SSpecies::class)->findBySpeciesId($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($catgN);
            return new JsonResponse($data);
        }
        $animal=new Animal();
        $category=$request->get('scatg');
        $ids=$this->getDoctrine()->getRepository(SSpecies::class)->findByName($category);
        $animal->setNickName($request->request->get('nickname'));
        $animal->setSize($request->request->get('taille'));
        $animal->setWeight($request->request->get('poids'));
        $animal->setColor($request->request->get('couleur'));
        $animal->setAge(new \DateTime($request->request->get('age')));
        $animal->setGender($request->request->get('sexe'));
        $animal->setDescription($request->request->get('description'));
        $animal->setImage($request->request->get('image'));
        $animal->setStatus("Adoption");
        $animal->setConfirmation(0);
        foreach ($ids as $idss)
        {$animal->setSSpeciesId($idss);}

        $adoption=new Adoption();
        $adoption->setDateAdoption(new \DateTime());
        $adoption->setDateExpiration(new \DateTime('+3 months'));
        $adoption->setAnimalId($animal);
        $idu=$this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
        $adoption->setUserId($idu);
        if(isset($_POST['save']))
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            $m=$this->getDoctrine()->getManager();
            $m->persist($adoption);
            $m->flush();
            return $this->redirectToRoute('_show_my_adoption');
        }
        return $this->render('AdoptionBundle:Adoption:create_adoption.html.twig', array(
            'catg'=>$catg
        ));
    }

    public function ShowMyAdoptionAction(Request $request)
    {
        $name = $request->get('opt');
        $id=$this->getDoctrine()->getRepository(Species::class)->findByName($name);

        $catgN=$this->getDoctrine()->getRepository(SSpecies::class)->findBySpeciesId($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($catgN);
            return new JsonResponse($data);
        }

        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $m=$this->getDoctrine()->getRepository(Species::class);
        $categories=$m->findAll();
        $adoptions=$em->lastzanimo();
        $adoption=$em->MesZanimo($this->getUser()->getId());
        return $this->render('AdoptionBundle:Adoption:show_my_adoption.html.twig', array(
            'adoptions'=>$adoptions,"categories"=>$categories,'adoption'=>$adoption
        ));
    }

    public function ShowAdoptionAction(Request $request)
    {
        $name = $request->get('opt');
        $id=$this->getDoctrine()->getRepository(Species::class)->findByName($name);

        $catgN=$this->getDoctrine()->getRepository(SSpecies::class)->findBySpeciesId($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($catgN);
            return new JsonResponse($data);
        }

        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $m=$this->getDoctrine()->getRepository(Species::class);
        $categories=$m->findAll();
        $adoptions=$em->lastzanimo();
        $zanim=$em->toutzanimo();
        $user=$this->getUser()->getId();
        $adoption=$em->OtherZanimo($this->getUser()->getId());
        return $this->render('AdoptionBundle:Adoption:show_adoption.html.twig', array(
            'adoptions'=>$adoptions,"categories"=>$categories,'adoption'=>$adoption,'zanim'=>$zanim ,'user'=>$user));
    }

    public function ShowAnimalAdoptionAction($id)
    {
        $em=$this->getDoctrine()->getRepository(Animal::class);
        $animal=$em->find($id);
        $em=$this->getDoctrine()->getRepository(Adoption::class);
        $user=$this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
        $adoption=$em->findByAnimalId($id);
        $requests=$this->getDoctrine()->getRepository(testAdoption::class)->Requests($id);
        $w=$this->getDoctrine()->getRepository(testAdoption::class)->wish($id,$this->getUser()->getId());
        $owner=$this->getDoctrine()->getRepository(Adoption::class)->findByAnimalId($id);
        $r=$this->getDoctrine()->getRepository(testAdoption::class)->chercherRequest($owner[0]->getAnimalId()->getIdAnimal(),$this->getUser()->getId());
        return $this->render('AdoptionBundle:Adoption:show_animal_adoption.html.twig', array(
            'animal'=>$animal,'adoption'=>$adoption[0],'requests'=>$requests,'user'=>$user,'w'=>$w,'r'=>$r
        ));
    }

    public function ValiderRequestAdoptionAction($id)
    {
        $m=$this->getDoctrine()->getManager();
        $animal=$m->getRepository(Animal::class)->find($id);
        $animal->setStatus('Adopte');
        $animal->setConfirmation(2);
        $requests=$m->getRepository(RequestAdoption::class)->findByIdAdoptionAnimal($id);
        $wish=$m->getRepository(wishlistAdoption::class)->findByAnimalId($id);
        if(isset($_POST['save']))
        {
            if($requests!=null)
            { foreach ($requests as $a)
                {$m->remove($a);}
                $m->flush();}
                if($wish!=null)
                {
                    foreach ($wish as $w)
                    {$m->remove($w);}
                    $m->flush();
                }
            return $this->redirectToRoute('_show_animal_adoption',array('id'=>$id));
        }
    }

    public function DeleteAdoptionAction($id)
    {
        $m=$this->getDoctrine()->getManager();
        $animal=$m->getRepository(Animal::class)->find($id);
        $z=$m->getRepository(Adoption::class)->findByAnimalId($id);
        $a=$m->getRepository(RequestAdoption::class)->findByIdAdoptionAnimal($id);
        if($z!=null)
        {$m->remove($z[0]);
            $m->flush();}
        if($animal!=null)
        {$m->remove($animal);
            $m->flush();}
        if($a!=null)
        {$m->remove($a[0]);
            $m->flush();}
        return $this->redirectToRoute('_show_my_adoption');
    }

    public function UpdateAdoptionAction(Request $request,$id)
    {
        $catg=$this->getDoctrine()->getRepository(Species::class)->findAll();
        $name = $request->get('opt');
        $id1=$this->getDoctrine()->getRepository(Species::class)->findByName($name);

        $catgN=$this->getDoctrine()->getRepository(SSpecies::class)->findBySpeciesId($id1);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($catgN);
            return new JsonResponse($data);}

        $em=$this->getDoctrine()->getRepository(Animal::class);
        $animal=$em->find($id);
        $scat=$animal->getSSpeciesId()->getSpeciesId();
        $mm=$this->getDoctrine()->getRepository(SSpecies::class);
        $scatt=$mm->findBySpeciesId($scat);
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $zanimo=$em->updatesearch($id);
        $adoption=$this->getDoctrine()->getRepository(Adoption::class)->findByAnimalId($id);
        if(isset($_POST['edit']))
        { $ids=$this->getDoctrine()->getRepository(SSpecies::class)->findByName($request->request->get('scatg'));
            $animal->setNickName($request->request->get('nickname'));
            $animal->setSize($request->request->get('taille'));
            $animal->setWeight($request->request->get('poids'));
            $animal->setColor($request->request->get('couleur'));
            $animal->setAge(new \DateTime($request->request->get('age')));
            $animal->setGender($request->request->get('sexe'));
            $animal->setDescription($request->request->get('description'));
            if($request->request->get('image')!=null)
            {$animal->setImage($request->request->get('image'));}
            $animal->setStatus("Adoption");
            $animal->setConfirmation(0);
            foreach ($ids as $idss)
            {$animal->setSSpeciesId($idss);}

            $adoption[0]->setDateAdoption(new \DateTime());
            $adoption[0]->setDateExpiration(new \DateTime('+3 months'));

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('_show_my_adoption');
        }
        return $this->render('AdoptionBundle:Adoption:update_adoption.html.twig', array('catg'=>$catg,'zanimo'=>$zanimo[0],'z'=>$animal,'scatt'=>$scatt));
    }

    public function SearchAdoptionAction(Request $request)
    {

        $id = $request->get('field');
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $animal = $em->chercher($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_adoption.html.twig', array(
            'animal'=>$animal
        ));
    }

    public function SearchAdoptionCatAction(Request $request)
    {

        $id = $request->get('field');
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $animal = $em->chercherCatg($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_adoption.html.twig', array(
            'animal'=>$animal
        ));
    }

    public function SearchMyAdoptionAction(Request $request)
    {

        $id = $request->get('field');
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $user=$this->getUser()->getId();
        $animal = $em->chercherMine($id,$user);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_my_adoption.html.twig', array(
            'animal'=>$animal
        ));
    }

    public function SearchMyAdoptionCatAction(Request $request)
    {

        $id = $request->get('field');
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $user=$this->getUser()->getId();
        $animal = $em->chercherMyCatg($id,$user);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_my_adoption.html.twig', array(
            'animal'=>$animal
        ));
    }
    public function RequestAdoptionAction(Request $request,$id)
    {
        $req=new RequestAdoption();
        $owner=$this->getDoctrine()->getRepository(Adoption::class)->findByAnimalId($id);
        $req->setIdAdoptionOwner($owner[0]->getUserId()->getId());
        $req->setIdAdoptionAnimal($owner[0]->getAnimalId()->getIdAnimal());
        $req->setIdUser($this->getUser()->getId());
        $req->setRaiser($request->request->get('eleveur'));
        $req->setBreed($request->request->get('race'));
        $req->setLocal($request->request->get('local'));
        $req->setGarden($request->request->get('jardin'));
        $req->setSpace($request->request->get('espace'));
        $req->setPlace($request->request->get('lieu'));
        $req->setCarry($request->request->get('carry'));
        $req->setNeighbour($request->request->get('voisin'));
        $req->setChild($request->request->get('enfant'));
        $req->setTime($request->request->get('temps'));
        $req->setEngagement($request->request->get('engagement'));
        $req->setHabits($request->request->get('habitude'));
        $req->setCharges($request->request->get('soin'));
        $req->setSacrifice($request->request->get('sacrifice'));
        $req->setFamilly($request->request->get('famille'));
        $req->setReady($request->request->get('pret'));
        $req->setDescription($request->request->get('description'));
        $req->setDateRequest(new \DateTime());
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $r=$em->chercherRequest($owner[0]->getAnimalId()->getIdAnimal(),$this->getUser()->getId());
        if(isset($_POST['save']) && empty($r))
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($req);
            $em->flush();
            return $this->redirectToRoute('_show_animal_adoption',array('id'=>$id));
        }
        return $this->render('AdoptionBundle:Adoption:request_adoption.html.twig', array('id'=>$id
            // ...
        ));
    }

    public function ShowAdoptionAdminAction(Request $request)
    {
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $animal = $em->lastzanimoAdmin();
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        $piechart=$this->PieChartJournee();
        $piechart1=$this->PieChartSemaine();
        $col=$this->ColumnChartSemaine();
        $piechart2=$this->PieChartMensuel();
        $piechart3=$this->PieChartAnnuel();
        return $this->render('AdoptionBundle:Adoption:show_adoption_admin.html.twig', array('piechart'=>$piechart,'piechart1'=>$piechart1,
        'col'=>$col,'piechart2'=>$piechart2,'piechart3'=>$piechart3));
    }


    public function showAdminAllAction(Request $request)
    {
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $animal = $em->allzanimoAdmin();
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($animal);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_adoption_admin.html.twig', array());
    }

    public function ValiderAdminAction($id)
    {
        $em=$this->getDoctrine()->getRepository(Animal::class);
        $animal=$em->find($id);
        if(isset($_POST['valider']))
        {
            $animal->setConfirmation(1);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
        }

        return $this->render('AdoptionBundle:Adoption:show_adoption_admin.html.twig', array());
    }

    public function SearchAdoptionAdminAction(Request $request)
    {
        $id = $request->get('search');
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $zanimo = $em->chercherCatgAdmin($id);
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer([new ObjectNormalizer()]);
            $data = $serializer->normalize($zanimo);
            return new JsonResponse($data);
        }
        return $this->render('AdoptionBundle:Adoption:show_adoption_admin.html.twig', array());
    }

    public function PieChartJournee()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $semaine=$em->lyouma();
        $nbrAdoption=0;
        $nbrAdopte=0;
        $nb1=0;
        $nbr2=0;
        foreach ($semaine as $s)
        {
            if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
            if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($semaine);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();
        if($total!=null)
        {array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
            $nb1=($nbrAdoption * 100 )/ $total;}
        else{array_push($stat, 'Adoption',50);}

        $stat=['adoption',$nb1];
        array_push($data, $stat);

        if($total!=null)
        {array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
            $nbr2=($nbrAdopte * 100) / $total;}
        else{array_push($stat, 'Adopté',0);}
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Les Pourcentages des zanimo adoptés de cette journée');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(800);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;}

    public function PieChartSemaine()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $semaine=$em->semaineTotalAdoption();
        $nbrAdoption=0;
        $nbrAdopte=0;
        foreach ($semaine as $s)
        {
            if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
            if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($semaine);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();

        if($total!=null)
        {array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);}
        else{array_push($stat, 'Adoption',0);}

        $nb1=($nbrAdoption * 100 )/ $total;
        $stat=['adoption',$nb1];
        array_push($data, $stat);

        if($total!=null)
        {array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);}
        else{array_push($stat, 'Adopté',0);}

        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Les Pourcentages des zanimo adoptés de cette semaine');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(800);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;
    }
    public  function BarChartMensuel()
    {
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $t=array();
        $tt=array();
        for ($i = 1; $i <= 7; $i++){
            $x=$em->BarSemaine($i);
            foreach ($x as $k)
            { $nbrAdoption=0;
                $nbrAdopte=0;
                if(($k['day'])=='1'){
                    $y=$em->jour($k['a']);
                    $x="Sun";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);

                }
                elseif (($k['day'])=='2'){
                    $y=$em->jour($k['a']);
                    $x="Mon";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);
                }
                elseif(($k['day'])=='3'){
                    $y=$em->jour($k['a']);
                    $x="Tue";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);

                }
                elseif(($k['day'])=='4'){
                    $y=$em->jour($k['a']);
                    $x="Wed";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);
                }
                elseif(($k['day'])=='5'){
                    $y=$em->jour($k['a']);
                    $x="Thu";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);
                }
                elseif(($k['day'])=='6'){
                    $y=$em->jour($k['a']);
                    $x="Fri";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);
                }
                elseif(($k['day'])=='7'){
                    $y=$em->jour($k['a']);
                    $x="Sat";
                    foreach ($y as $s)
                    {
                        if($s->getAnimalId()->getConfirmation()==1){$nbrAdoption++;}
                        if($s->getAnimalId()->getConfirmation()==2){$nbrAdopte++;}

                    }array_push($t,$x);
                }
                if($nbrAdoption+$nbrAdopte != 0)
                {array_push($tt,($nbrAdopte*100)/($nbrAdopte+$nbrAdoption));}
                else{array_push($tt,0);}
            }}
        $s=array_combine($t,$tt);
        return (array('0'=>$t,'1'=>$s));
    }

    public function ColumnChartSemaine()
    {


        $s=$this->BarChartMensuel();
        $col = new ColumnChart();
        $data = array(['Element', 'Adoptés']);
        $j=0;
        foreach ($s[0] as $ss)
        { $j++;
            $i=0;
            foreach ($s[1] as $q)
            {
                $i++;
                if($i==$j)
                {
                    array_push($data,[$ss,$q]);}
            }
        }

        $col->getData()->setArrayToDataTable($data);
        $col->getOptions()->setTitle('Les Pourcentages des zanimo adoptés de cette semaine');
        $col->getOptions()->getAnnotations()->setAlwaysOutside(true);
        $col->getOptions()->getAnnotations()->getTextStyle()->setFontSize(14);
        $col->getOptions()->getAnnotations()->getTextStyle()->setColor('#000');
        $col->getOptions()->getAnnotations()->getTextStyle()->setAuraColor('none');
        $col->getOptions()->getHAxis()->setTitle('Day');
        $col->getOptions()->getHAxis()->setFormat('h:mm a');
        $col->getOptions()->getHAxis()->getViewWindow()->setMin([7, 30, 0]);
        $col->getOptions()->getHAxis()->getViewWindow()->setMax([17, 30, 0]);
        $col->getOptions()->setWidth(800);
        $col->getOptions()->setHeight(500);
        $MY_COLORS = array('purple');
        $col->getOptions()->setColors($MY_COLORS);
        $col->getOptions()->setDataOpacity(0.5);
        return $col;
    }
    public function PieChartMensuel()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $semaine=$em->Cemois();
        $nbrAdoption=0;
        $nbrAdopte=0;
        foreach ($semaine as $s)
        {
            $animal=$this->getDoctrine()->getRepository(Animal::class)->findByIdAnimal($s);
            if($animal[0]->getConfirmation()==1){$nbrAdoption++;}
            if($animal[0]->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($semaine);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();
        array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
        $nb1=($nbrAdoption * 100 )/ $total;
        $stat=['adoption',$nb1];
        array_push($data, $stat);

        array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Pourcentages des animeaux adoptés');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(800);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;    }

    public function PieChartAnnuel()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $annee=$em->Annee();
        $nbrAdoption=0;
        $nbrAdopte=0;
        foreach ($annee as $s)
        {
            $animal=$this->getDoctrine()->getRepository(Animal::class)->findByIdAnimal($s);
            if($animal[0]->getConfirmation()==1){$nbrAdoption++;}
            if($animal[0]->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($annee);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();
        array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
        $nb1=($nbrAdoption * 100 )/ $total;
        $stat=['adoption',$nb1];
        array_push($data, $stat);

        array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Les pourcentages des animeaux adoptés');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(800);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;    }
}

