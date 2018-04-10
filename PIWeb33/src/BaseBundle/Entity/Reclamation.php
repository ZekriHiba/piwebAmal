<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="User_ID", columns={"User_ID"}), @ORM\Index(name="Animal_ID", columns={"Animal_ID"})})
 * @ORM\Entity
 */
class Reclamation
{


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Animal")
     * @ORM\Id
     * @ORM\JoinColumn(name="Animal_Id", referencedColumnName="Id_Animal")
     */
    private $animalId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Users")
     * @ORM\Id
     * @ORM\JoinColumn(name="User_id", referencedColumnName="User_Id")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_rec", type="date", nullable=true)
     */
    private $dateRec;



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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Reclamation
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
     * Set dateRec
     *
     * @param \DateTime $dateRec
     *
     * @return Reclamation
     */
    public function setDateRec($dateRec)
    {
        $this->dateRec = $dateRec;

        return $this;
    }

    /**
     * Get dateRec
     *
     * @return \DateTime
     */
    public function getDateRec()
    {
        return $this->dateRec;
    }

    /**
     * Set animalId
     *
     * @param \BaseBundle\Entity\Animal $animalId
     *
     * @return Reclamation
     */
    public function setAnimalId(\BaseBundle\Entity\Animal $animalId)
    {
        $this->animalId = $animalId;

        return $this;
    }
}
