<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * wishlistAdoption
 *
 * @ORM\Table(name="wishlist_adoption")
 * @ORM\Entity(repositoryClass="BaseBundle\Repository\wishlistAdoptionRepository")
 */
class wishlistAdoption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Animal")
     *
     * @ORM\JoinColumn(name="Animal_Id", referencedColumnName="Id_Animal")
     */
    private $animalId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     *
     * @ORM\JoinColumn(name="User_Id",referencedColumnName="id")
     */
    private $userId;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set animalId
     *
     * @param integer $animalId
     *
     * @return wishlistAdoption
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
     * Set userId
     *
     * @param integer $userId
     *
     * @return wishlistAdoption
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
}
