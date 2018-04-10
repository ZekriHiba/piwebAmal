<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SSpecies
 *
 * @ORM\Table(name="s_species")
 * @ORM\Entity
 */
class SSpecies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="S_Species_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sSpeciesId;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Species")
     * @ORM\JoinColumn(name="Species_Id", referencedColumnName="Species_Id")
     */
    private $speciesId;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;



    /**
     * Get sSpeciesId
     *
     * @return integer
     */
    public function getSSpeciesId()
    {
        return $this->sSpeciesId;
    }

    /**
     * Set speciesId
     *
     * @param integer $speciesId
     *
     * @return SSpecies
     */
    public function setSpeciesId($speciesId)
    {
        $this->speciesId = $speciesId;

        return $this;
    }

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
     * @return SSpecies
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
