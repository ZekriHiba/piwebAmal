<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subtitlearticle
 *
 * @ORM\Table(name="subtitlearticle")
 * @ORM\Entity
 */
class Subtitlearticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="subTitle_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subtitleId;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Article")
     * @ORM\JoinColumn(name="article_Id ", referencedColumnName="Article_ID")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="title_st", type="string", length=255, nullable=false)
     */
    private $titleSt;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;



    /**
     * Get subtitleId
     *
     * @return integer
     */
    public function getSubtitleId()
    {
        return $this->subtitleId;
    }

    /**
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return Subtitlearticle
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get articleId
     *
     * @return integer
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set titleSt
     *
     * @param string $titleSt
     *
     * @return Subtitlearticle
     */
    public function setTitleSt($titleSt)
    {
        $this->titleSt = $titleSt;

        return $this;
    }

    /**
     * Get titleSt
     *
     * @return string
     */
    public function getTitleSt()
    {
        return $this->titleSt;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Subtitlearticle
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
     * Set image
     *
     * @param string $image
     *
     * @return Subtitlearticle
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
