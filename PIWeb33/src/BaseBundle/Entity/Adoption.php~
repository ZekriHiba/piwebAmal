<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adoption
 *
 * @ORM\Table(name="adoption")
 * @ORM\Entity
 */
class Adoption
{
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\Id
     * @ORM\JoinColumn(name="User_Id",referencedColumnName="id")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Animal")
     * @ORM\Id
     * @ORM\JoinColumn(name="Animal_Id", referencedColumnName="Id_Animal")
     */
    private $animalId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_adoption", type="date", nullable=false)
     */
    private $dateAdoption;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_expiration", type="date", nullable=false)
     */
    private $dateExpiration;



    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Adoption
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set animalId
     *
     * @param integer $animalId
     *
     * @return Adoption
     */
    public function setAnimalId($animalId)
    {
        $this->animalId = $animalId;

        return $this;
    }

    /**
     * Get animalId
     *
     * @return integer
     */
    public function getAnimalId()
    {
        return $this->animalId;
    }

    /**
     * Set dateAdoption
     *
     * @param \DateTime $dateAdoption
     *
     * @return Adoption
     */
    public function setDateAdoption($dateAdoption)
    {
        $this->dateAdoption = $dateAdoption;

        return $this;
    }

    /**
     * Get dateAdoption
     *
     * @return \DateTime
     */
    public function getDateAdoption()
    {
        return $this->dateAdoption;
    }

    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     *
     * @return Adoption
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }
}
