<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity
 */
class Species
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Species_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $speciesId;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", nullable=false)
     */
    private $name;



    /**
     * Get speciesId
     *
     * @return integer
     */
    public function getSpeciesId()
    {
        return $this->speciesId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Species
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
}
