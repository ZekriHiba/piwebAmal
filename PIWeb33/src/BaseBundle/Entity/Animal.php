<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animal
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity
 */
class Animal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Animal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnimal;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\SSpecies")
     * @ORM\JoinColumn(name="S_Species_Id", referencedColumnName="S_Species_Id")
     */
    private $sSpeciesId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="Weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Age", type="date", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="Price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="Nick_Name", type="string", length=255, nullable=false)
     */
    private $nickName;

    /**
     * @var string
     *
     * @ORM\Column(name="Color", type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="Gender", type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="Confirmation", type="integer", nullable=false)
     */
    private $confirmation = '0';



    /**
     * Get idAnimal
     *
     * @return integer
     */
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Animal
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Animal
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set age
     *
     * @param \DateTime $age
     *
     * @return Animal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Animal
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

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Animal
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Animal
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set nickName
     *
     * @param string $nickName
     *
     * @return Animal
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Animal
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Animal
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Animal
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set confirmation
     *
     * @param integer $confirmation
     *
     * @return Animal
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    /**
     * Get confirmation
     *
     * @return integer
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * Set sSpeciesId
     *
     * @param \BaseBundle\Entity\SSpecies $sSpeciesId
     *
     * @return Animal
     */
    public function setSSpeciesId(\BaseBundle\Entity\SSpecies $sSpeciesId = null)
    {
        $this->sSpeciesId = $sSpeciesId;

        return $this;
    }

    /**
     * Get sSpeciesId
     *
     * @return \BaseBundle\Entity\SSpecies
     */
    public function getSSpeciesId()
    {
        return $this->sSpeciesId;
    }
}
