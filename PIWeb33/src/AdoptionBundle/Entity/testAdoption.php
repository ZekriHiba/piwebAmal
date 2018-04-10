<?php

namespace AdoptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * testAdoption
 *
 * @ORM\Table(name="test_adoption")
 * @ORM\Entity(repositoryClass="AdoptionBundle\Repository\testAdoptionRepository")
 */
class testAdoption
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

