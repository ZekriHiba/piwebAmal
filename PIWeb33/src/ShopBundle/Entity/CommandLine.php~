<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandLine
 *
 * @ORM\Table(name="command_line")
 * @ORM\Entity
 */
class CommandLine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Line_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lineId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Order_Id", type="integer", nullable=true)
     */
    private $orderId;


    /**
     * @var integer
     *
     * @ORM\Column(name="Poduct_Id", type="integer", nullable=false)
     */
    private $poductId;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Animal")
     * @ORM\JoinColumn(name="Animal_Id", referencedColumnName="Id_Animal")
     */
    private $animalId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="Price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=true)
     */
    private $image;



    /**
     * Get lineId
     *
     * @return integer
     */
    public function getLineId()
    {
        return $this->lineId;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return CommandLine
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set poductId
     *
     * @param integer $poductId
     *
     * @return CommandLine
     */
    public function setPoductId($poductId)
    {
        $this->poductId = $poductId;

        return $this;
    }

    /**
     * Get poductId
     *
     * @return integer
     */
    public function getPoductId()
    {
        return $this->poductId;
    }

    /**
     * Set animalId
     *
     * @param integer $animalId
     *
     * @return CommandLine
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return CommandLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CommandLine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return CommandLine
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
     * Set image
     *
     * @param string $image
     *
     * @return CommandLine
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
}
