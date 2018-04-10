<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Article_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleId;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Users")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="User_Id")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="Title_Article", type="string", length=50, nullable=false)
     */
    private $titleArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;



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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Article
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
     * Set titleArticle
     *
     * @param string $titleArticle
     *
     * @return Article
     */
    public function setTitleArticle($titleArticle)
    {
        $this->titleArticle = $titleArticle;

        return $this;
    }

    /**
     * Get titleArticle
     *
     * @return string
     */
    public function getTitleArticle()
    {
        return $this->titleArticle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
