<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="Longit", type="string", length=255, nullable=true)
     */
    private $longit;

    /**
     * @var string
     *
     * @ORM\Column(name="Lat", type="string", length=255, nullable=true)
     */
    private $lat;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Users")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="User_Id")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Views", type="integer", nullable=false)
     */
    private $views;



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
     * Set title
     *
     * @param string $title
     *
     * @return Annonce
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Annonce
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set longit
     *
     * @param string $longit
     *
     * @return Annonce
     */
    public function setLongit($longit)
    {
        $this->longit = $longit;

        return $this;
    }

    /**
     * Get longit
     *
     * @return string
     */
    public function getLongit()
    {
        return $this->longit;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Annonce
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Annonce
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
     * Set views
     *
     * @param integer $views
     *
     * @return Annonce
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }
}
