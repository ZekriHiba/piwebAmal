<?php

namespace AdoptionBundle\Repository;

/**
 * testAdoptionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class testAdoptionRepository extends \Doctrine\ORM\EntityRepository
{
    public function delete($id)
    {
        $q= $this->getEntityManager()->createQuery(
            "select a from BaseBundle:Adoption a where a.animalId=:field")->setParameter('field',$id);
        return $q->getResult();
    }

    public function categoryid($name)
    {
        $q= $this->getEntityManager()->createQuery(
            "select a.speciesId from BaseBundle:Species a where a.name=:opt")->setParameter('opt',$name);
        return $q->getResult();
    }

    public function chercher($id)
    {
        if($id == null){
            return $this->getEntityManager()->createQuery(
                "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=1 AND a.status='Adoption'")
                ->getResult();
        }
        return $this->getEntityManager()->createQuery(
            "SELECT b from BaseBundle:Adoption b JOIN b.animalId a JOIN a.sSpeciesId d WHERE  a.confirmation=1 AND a.status='Adoption' AND ( a.nickName = :field OR d.name = :field)"
        )
            ->setParameter('field',$id)
            ->getResult();
    }

    public function chercherCatg($id)
    {
        if($id == null){
            return $this->getEntityManager()->createQuery(
                "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=1 AND a.status='Adoption'")
                ->getResult();
        }
        return $this->getEntityManager()->createQuery(
            "SELECT b FROM BaseBundle:Adoption b JOIN b.animalId a JOIN a.sSpeciesId d JOIN d.speciesId e WHERE a.sSpeciesId=d.sSpeciesId  AND a.status='Adoption' AND a.confirmation=1 AND e.name =:field"
        ) ->setParameter('field',$id)
            ->getResult();
    }

    public function chercherMine($id,$user)
    {
        if($id == null){
            return $this->getEntityManager()->createQuery(
                "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=1 AND a.status='Adoption' AND b.userId=:usr")->setParameter('usr',$user)
                ->getResult();
        }
        return $this->getEntityManager()->createQuery(
            "SELECT b from BaseBundle:Adoption b JOIN b.animalId a JOIN a.sSpeciesId d WHERE a.status='Adoption' AND  a.confirmation=1 AND b.userId=:usr AND ( a.nickName = :field OR d.name = :field)"
        )
            ->setParameter('field',$id)->setParameter('usr',$user)
            ->getResult();
    }

    public function chercherMyCatg($id,$user)
    {
        if($id == null){
            return $this->getEntityManager()->createQuery(
                "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=1 AND a.status='Adoption' AND b.userId=:usr")->setParameter('usr',$user)
                ->getResult();
        }
        return $this->getEntityManager()->createQuery(
            "SELECT b FROM BaseBundle:Adoption b JOIN b.animalId a JOIN a.sSpeciesId d JOIN d.speciesId e WHERE a.sSpeciesId=d.sSpeciesId AND a.status='Adoption' AND b.userId=:usr AND a.confirmation=1 AND e.name =:field"
        )
            ->setParameter('field',$id)->setParameter('usr',$user)
            ->getResult();
    }

    public function chercherCatgAdmin($id)
    {
        if($id == null){
            return $this->getEntityManager()->createQuery(
                "SELECT b FROM BaseBundle:Animal b WHERE  b.confirmation=0 AND b.status='Adoption'"
            )
                ->getResult();
        }
        return $this->getEntityManager()->createQuery(
            "SELECT b FROM BaseBundle:Animal b JOIN b.sSpeciesId a JOIN a.speciesId d WHERE b.sSpeciesId=a.sSpeciesId AND b.status='Adoption' AND b.confirmation=0 AND (d.name = :search OR a.name=:search) "
        )
            ->setParameter('search',$id)
            ->getResult();
    }

    public function lastzanimo()
    {
        $q= $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=1 AND a.status='Adoption' ORDER BY b.dateAdoption DESC");
        return $q->getResult();
    }

    public function lastzanimoAdmin()
    {
        $q= $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=0 AND a.status='Adoption' ORDER BY b.dateAdoption DESC")->setMaxResults(8);
        return $q->getResult();
    }

    public function allzanimoAdmin()
    {
        $q= $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.confirmation=0 AND a.status='Adoption' ORDER BY b.dateAdoption DESC");
        return $q->getResult();
    }
    public function updatesearch($id)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT b FROM BaseBundle:Animal b where b.status='Adoption' AND b.idAnimal=:id")->setParameter('id',$id)
            ->getResult();
    }

    public function OtherZanimo($id)
    {
        return $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.status='Adoption' AND a.confirmation=1 AND b.userId!=:id")->setParameter('id',$id)
            ->getResult();
    }

    public function MesZanimo($id)
    {
        return $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.status='Adoption' AND a.confirmation=1 AND b.userId=:id")->setParameter('id',$id)
            ->getResult();
    }

    public function toutzanimo()
    {
        return $this->getEntityManager()->createQuery(
            "select b from BaseBundle:Adoption b JOIN b.animalId a WHERE a.status='Adoption' AND a.confirmation=1")
            ->getResult();
    }
    public function chercherRequest($animal,$user)
    {
        return $this->getEntityManager()->createQuery(
            "select b from BaseBundle:RequestAdoption b WHERE b.idAdoptionAnimal=:animal AND b.idUser=:usr")
            ->setParameter('animal',$animal)->setParameter('usr',$user)
            ->getResult();
    }
    public function Requests($animal)
    {
        return $this->getEntityManager()->createQuery(
            "select b,u from BaseBundle:RequestAdoption b JOIN UserBundle:User u WHERE b.idAdoptionAnimal=:animal AND  u.id=b.idUser")
            ->setParameter('animal',$animal)
            ->getResult();
    }

    public function wish($id,$user)
    {
        return $this->getEntityManager()->createQuery(
            "select b from BaseBundle:wishlistAdoption b WHERE b.animalId=:animal AND b.userId=:usr")
            ->setParameter('animal',$id)->setParameter('usr',$user)
            ->getResult();
    }

    public function nbrAdoption()
    {
        return $this->getEntityManager()->createQuery(
            "SELECT a FROM BaseBundle:Animal a WHERE a.status='Adoption' And a.confirmation='1'")
            ->getResult();
    }

    public function nbrAdopte()
    {
        return $this->getEntityManager()->createQuery(
            "SELECT a FROM BaseBundle:Animal a WHERE a.status='Adopte' And a.confirmation='2'")
            ->getResult();
    }

    public function semaineTotalAdoption()
    {
        return $this->getEntityManager()->createQuery(
            "SELECT a FROM BaseBundle:Adoption a JOIN a.animalId b WHERE b.confirmation!='0' AND DATE_DIFF(CURRENT_DATE() ,a.dateAdoption)< 7 AND (b.status='Adopte' or b.status='Adoption')")
            ->getResult();
    }
    public function lyouma()
    {
        return $this->getEntityManager()->createQuery(
            "SELECT a FROM BaseBundle:Adoption a JOIN a.animalId b WHERE b.confirmation!='0' AND a.dateAdoption=CURRENT_DATE() AND (b.status='Adopte' or b.status='Adoption')")
            ->getResult();
    }

    public function Cemois()
    {
        return $this->getEntityManager()->getConnection()->executeQuery("SELECT DISTINCT(a.Animal_Id) FROM Adoption a JOIN Animal b WHERE
 b.confirmation!='0' AND MONTH(a.Date_adoption)=MONTH(CURRENT_DATE()) AND YEAR(a.Date_adoption)=YEAR(CURRENT_DATE() )
 AND (b.status='Adopte' or b.status='Adoption')")->fetchAll();
    }
    public function Annee()
    {
        return $this->getEntityManager()->getConnection()->executeQuery("SELECT DISTINCT(a.Animal_Id) FROM Adoption a JOIN Animal b WHERE
 b.confirmation!='0' AND YEAR(a.Date_adoption)=YEAR(CURRENT_DATE() )
 AND (b.status='Adopte' or b.status='Adoption')")->fetchAll();
    }

    public function BarSemaine($i)
    {
        return $this->getEntityManager()->getConnection()->executeQuery("SELECT  DISTINCT (DAYOFWEEK(a.Date_adoption)) as day ,( a.Date_adoption) as a
    FROM Adoption a JOIN Animal b WHERE b.confirmation!='0' AND (b.status='Adopte' or b.status='Adoption')
     AND DATEDIFF(CURRENT_DATE (),Date_adoption)=7-$i")->fetchAll();
    }
    public function jour($date)
    {
        return $this->getEntityManager()->createQuery(
            "SELECT a FROM BaseBundle:Adoption a JOIN a.animalId b WHERE b.confirmation!='0'
        AND a.dateAdoption=:dat AND (b.status='Adopte' or b.status='Adoption')")
            ->setParameter('dat',$date)
            ->getResult();
    }
}