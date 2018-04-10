<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rating
{

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\Product")
     * @ORM\Id
     * @ORM\JoinColumn(name="Id_Product", referencedColumnName="Id_Product")
     */


    private $idProduct;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float", precision=10, scale=0, nullable=false)
     */
    private $rate;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Users")
     * @ORM\Id
     * @ORM\JoinColumn(name="User_id", referencedColumnName="User_Id")
     */
    private $idUser;



    /**
     * Set idProduct
     *
     * @param integer $idProduct
     *
     * @return Rating
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * Get idProduct
     *
     * @return integer
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set rate
     *
     * @param float $rate
     *
     * @return Rating
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Rating
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
}
