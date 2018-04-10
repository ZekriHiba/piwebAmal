<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="User_ID", columns={"User_ID"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Question_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionId;

    /**
     * @ORM\ManyToOne(targetEntity="BaseBundle\Entity\Users")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="User_Id")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="Question", type="text", length=65535, nullable=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="Answer", type="string", length=5000, nullable=true)
     */
    private $answer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Q", type="date", nullable=false)
     */
    private $dateQ;



    /**
     * Get questionId
     *
     * @return integer
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Question
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
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return Question
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set dateQ
     *
     * @param \DateTime $dateQ
     *
     * @return Question
     */
    public function setDateQ($dateQ)
    {
        $this->dateQ = $dateQ;

        return $this;
    }

    /**
     * Get dateQ
     *
     * @return \DateTime
     */
    public function getDateQ()
    {
        return $this->dateQ;
    }
}
