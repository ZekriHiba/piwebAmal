<?php

namespace AdoptionBundle\Controller;

use AdoptionBundle\Entity\testAdoption;
use BaseBundle\Entity\Animal;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdoptionBundle:Default:index.html.twig', array(
        ));
    }




    public function loginAction()
    {

        if ($this->getUser()->getId()==1)
        {
            return $this->redirectToRoute('_show_adoption_admin');
        }
        else{
            return $this->redirectToRoute('adoption_homepage');
        }
    }

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
        $piechart->getOptions()->setWidth(900);
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
