<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestAdoption
 *
 * @ORM\Table(name="request_adoption")
 * @ORM\Entity
 */
class RequestAdoption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_request", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRequest;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_adoption_animal", type="integer", nullable=false)
     */
    private $idAdoptionAnimal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_adoption_owner", type="integer", nullable=false)
     */
    private $idAdoptionOwner;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_request", type="date", nullable=false)
     */
    private $dateRequest;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Raiser", type="boolean", nullable=false)
     */
    private $raiser;

    /**
     * @var string
     *
     * @ORM\Column(name="Local", type="string", length=255, nullable=true)
     */
    private $local;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Garden", type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Space", type="boolean", nullable=true)
     */
    private $space;

    /**
     * @var string
     *
     * @ORM\Column(name="Place", type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="Carry", type="string", length=255, nullable=true)
     */
    private $carry;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Neighbour", type="boolean", nullable=true)
     */
    private $neighbour;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Child", type="boolean", nullable=true)
     */
    private $child;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Time", type="boolean", nullable=false)
     */
    private $time;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Breed", type="boolean", nullable=false)
     */
    private $breed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Engagement", type="boolean", nullable=false)
     */
    private $engagement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Habits", type="boolean", nullable=false)
     */
    private $habits;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Charges", type="boolean", nullable=false)
     */
    private $charges;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Ready", type="boolean", nullable=false)
     */
    private $ready;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Sacrifice", type="boolean", nullable=false)
     */
    private $sacrifice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Familly", type="boolean", nullable=false)
     */
    private $familly;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=150, nullable=true)
     */
    private $description;



    /**
     * Get idRequest
     *
     * @return integer
     */
    public function getIdRequest()
    {
        return $this->idRequest;
    }

    /**
     * Set idAdoptionAnimal
     *
     * @param integer $idAdoptionAnimal
     *
     * @return RequestAdoption
     */
    public function setIdAdoptionAnimal($idAdoptionAnimal)
    {
        $this->idAdoptionAnimal = $idAdoptionAnimal;

        return $this;
    }

    /**
     * Get idAdoptionAnimal
     *
     * @return integer
     */
    public function getIdAdoptionAnimal()
    {
        return $this->idAdoptionAnimal;
    }

    /**
     * Set idAdoptionOwner
     *
     * @param integer $idAdoptionOwner
     *
     * @return RequestAdoption
     */
    public function setIdAdoptionOwner($idAdoptionOwner)
    {
        $this->idAdoptionOwner = $idAdoptionOwner;

        return $this;
    }

    /**
     * Get idAdoptionOwner
     *
     * @return integer
     */
    public function getIdAdoptionOwner()
    {
        return $this->idAdoptionOwner;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return RequestAdoption
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set dateRequest
     *
     * @param \DateTime $dateRequest
     *
     * @return RequestAdoption
     */
    public function setDateRequest($dateRequest)
    {
        $this->dateRequest = $dateRequest;

        return $this;
    }

    /**
     * Get dateRequest
     *
     * @return \DateTime
     */
    public function getDateRequest()
    {
        return $this->dateRequest;
    }

    /**
     * Set raiser
     *
     * @param boolean $raiser
     *
     * @return RequestAdoption
     */
    public function setRaiser($raiser)
    {
        $this->raiser = $raiser;

        return $this;
    }

    /**
     * Get raiser
     *
     * @return boolean
     */
    public function getRaiser()
    {
        return $this->raiser;
    }

    /**
     * Set local
     *
     * @param string $local
     *
     * @return RequestAdoption
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set garden
     *
     * @param boolean $garden
     *
     * @return RequestAdoption
     */
    public function setGarden($garden)
    {
        $this->garden = $garden;

        return $this;
    }

    /**
     * Get garden
     *
     * @return boolean
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * Set space
     *
     * @param boolean $space
     *
     * @return RequestAdoption
     */
    public function setSpace($space)
    {
        $this->space = $space;

        return $this;
    }

    /**
     * Get space
     *
     * @return boolean
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * Set place
     *
     * @param string $place
     *
     * @return RequestAdoption
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set carry
     *
     * @param string $carry
     *
     * @return RequestAdoption
     */
    public function setCarry($carry)
    {
        $this->carry = $carry;

        return $this;
    }

    /**
     * Get carry
     *
     * @return string
     */
    public function getCarry()
    {
        return $this->carry;
    }

    /**
     * Set neighbour
     *
     * @param boolean $neighbour
     *
     * @return RequestAdoption
     */
    public function setNeighbour($neighbour)
    {
        $this->neighbour = $neighbour;

        return $this;
    }

    /**
     * Get neighbour
     *
     * @return boolean
     */
    public function getNeighbour()
    {
        return $this->neighbour;
    }

    /**
     * Set child
     *
     * @param boolean $child
     *
     * @return RequestAdoption
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return boolean
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set time
     *
     * @param boolean $time
     *
     * @return RequestAdoption
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return boolean
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set breed
     *
     * @param boolean $breed
     *
     * @return RequestAdoption
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return boolean
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set engagement
     *
     * @param boolean $engagement
     *
     * @return RequestAdoption
     */
    public function setEngagement($engagement)
    {
        $this->engagement = $engagement;

        return $this;
    }

    /**
     * Get engagement
     *
     * @return boolean
     */
    public function getEngagement()
    {
        return $this->engagement;
    }

    /**
     * Set habits
     *
     * @param boolean $habits
     *
     * @return RequestAdoption
     */
    public function setHabits($habits)
    {
        $this->habits = $habits;

        return $this;
    }

    /**
     * Get habits
     *
     * @return boolean
     */
    public function getHabits()
    {
        return $this->habits;
    }

    /**
     * Set charges
     *
     * @param boolean $charges
     *
     * @return RequestAdoption
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return boolean
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set ready
     *
     * @param boolean $ready
     *
     * @return RequestAdoption
     */
    public function setReady($ready)
    {
        $this->ready = $ready;

        return $this;
    }

    /**
     * Get ready
     *
     * @return boolean
     */
    public function getReady()
    {
        return $this->ready;
    }

    /**
     * Set sacrifice
     *
     * @param boolean $sacrifice
     *
     * @return RequestAdoption
     */
    public function setSacrifice($sacrifice)
    {
        $this->sacrifice = $sacrifice;

        return $this;
    }

    /**
     * Get sacrifice
     *
     * @return boolean
     */
    public function getSacrifice()
    {
        return $this->sacrifice;
    }

    /**
     * Set familly
     *
     * @param boolean $familly
     *
     * @return RequestAdoption
     */
    public function setFamilly($familly)
    {
        $this->familly = $familly;

        return $this;
    }

    /**
     * Get familly
     *
     * @return boolean
     */
    public function getFamilly()
    {
        return $this->familly;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return RequestAdoption
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
