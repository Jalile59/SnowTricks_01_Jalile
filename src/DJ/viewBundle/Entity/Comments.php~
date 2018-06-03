<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\CommentsRepository")
 */
class Comments
{
    /**
     *@ORM\ManyToOne(targetEntity="DJ\usersecurityBundle\Entity\User", inversedBy="comments")
     * @var type 
     */
    private $userId;
    /**
     *@ORM\ManyToOne(targetEntity="DJ\viewBundle\Entity\Figures", inversedBy="comments")
     * 
     * @var type 
     */
    private $figureId;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commentContent", type="text", nullable=true)
     */
    private $commentContent;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="comment_createDate", type="datetime")
     */
    private $commentCreateDate;

    
    public function __construct() {
        $this->commentCreateDate= new \DateTime();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
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
     * Set commentCreateDate
     *
     * @param string $commentCreateDate
     *
     * @return Comments
     */
    public function setCommentCreateDate($commentCreateDate)
    {
        $this->commentCreateDate = $commentCreateDate;

        return $this;
    }

    /**
     * Get commentCreateDate
     *
     * @return string
     */
    public function getCommentCreateDate()
    {
        return $this->commentCreateDate;
    }

    /**
     * Set userId
     *
     * @param \DJ\usersecurityBundle\Entity\User $userId
     *
     * @return Comments
     */
    public function setUserId(\DJ\usersecurityBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \DJ\usersecurityBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set figureId
     *
     * @param \DJ\viewBundle\Entity\Figures $figureId
     *
     * @return Comments
     */
    public function setFigureId(\DJ\viewBundle\Entity\Figures $figureId = null)
    {
        $this->figureId = $figureId;

        return $this;
    }

    /**
     * Get figureId
     *
     * @return \DJ\viewBundle\Entity\Figures
     */
    public function getFigureId()
    {
        return $this->figureId;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     *
     * @return Comments
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }
}
