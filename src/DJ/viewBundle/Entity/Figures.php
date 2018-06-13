<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Figures
 *
 * @ORM\Table(name="figures")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\FiguresRepository")
 */
class Figures
{   
    /**
     * @ORM\Column(name="categorie", type="string", length=255)
     * @var type string
     */
    private $categories;
    
    /**
     *@ORM\ManyToOne(targetEntity="DJ\usersecurityBundle\Entity\User", cascade={"persist"})
     * @var type 
     */
    
    private $users;
    /**
     *@ORM\OneToMany(targetEntity=Comments::class, cascade={"persist", "remove"}, mappedBy="figureId")
     * @var type 
     */
    private $comments;
    
    /**
     *@ORM\OneToMany(targetEntity=Videos::class, cascade={"persist", "remove"}, mappedBy="figurevideo")
     * 
     *
     */
    private $videofigure;
    
   
    /**
     *@ORM\OneToMany(targetEntity=Pictures::class, cascade={"persist", "remove"}, mappedBy="figure")
     * 
     *
     */

    private $picture;
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
     * @ORM\Column(name="figure_name", type="string", length=255, unique=true)
     */
    private $figureName;

    /**
     * @var string
     *
     * @ORM\Column(name="figure_description", type="text")
     */
    private $figureDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="figure_createdate", type="datetime")
     */
    private $figureCreatedate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="figure_updatedate", type="datetime", nullable=true)
     */
    private $figureUpdatedate;


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
     * Set figureName
     *
     * @param string $figureName
     *
     * @return Figures
     */
    public function setFigureName($figureName)
    {
        $this->figureName = $figureName;

        return $this;
    }

    /**
     * Get figureName
     *
     * @return string
     */
    public function getFigureName()
    {
        return $this->figureName;
    }

    /**
     * Set figureDescription
     *
     * @param string $figureDescription
     *
     * @return Figures
     */
    public function setFigureDescription($figureDescription)
    {
        $this->figureDescription = $figureDescription;
        
        return $this;
    }

    /**
     * Get figureDescription
     *
     * @return string
     */
    public function getFigureDescription()
    {
        return $this->figureDescription;
    }

    /**
     * Set figureCreatedate
     *
     * @param \DateTime $figureCreatedate
     *
     * @return Figures
     */
    public function setFigureCreatedate($figureCreatedate)
    {
        $this->figureCreatedate = $figureCreatedate;

        return $this;
    }

    /**
     * Get figureCreatedate
     *
     * @return \DateTime
     */
    public function getFigureCreatedate()
    {
        return $this->figureCreatedate;
    }

    /**
     * Set figureUpdatedate
     *
     * @param \DateTime $figureUpdatedate
     *
     * @return Figures
     */
    public function setFigureUpdatedate($figureUpdatedate)
    {
        $this->figureUpdatedate = $figureUpdatedate;

        return $this;
    }

    /**
     * Get figureUpdatedate
     *
     * @return \DateTime
     */
    public function getFigureUpdatedate()
    {
        return $this->figureUpdatedate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->picture = new \Doctrine\Common\Collections\ArrayCollection();
        $this->videofigure = new \Doctrine\Common\Collections\ArrayCollection();
        
    }

    /**
     * Add picture
     *
     * @param \DJ\viewBundle\Entity\Pictures $picture
     *
     * @return Figures
     */
    public function addPicture(\DJ\viewBundle\Entity\Pictures $picture)
    {
        $this->picture[] = $picture;
        $picture->setFigure($this);

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \DJ\viewBundle\Entity\Pictures $picture
     */
    public function removePicture(\DJ\viewBundle\Entity\Pictures $picture)
    {
        $this->picture->removeElement($picture);
    }

    /**
     * Get picture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPicture()
    {
        return $this->picture;
    }
    
    public function __toString() {
        return $this->figureName;
    }

    /**
     * Set pictureAcceuil
     *
     * @param string $pictureAcceuil
     *
     * @return Figures
     */
    public function setPictureAcceuil($pictureAcceuil)
    {   
        
        
        
        $name = $this->renamefile($pictureAcceuil);
        
        $pictureAcceuil->move('../web/imagesacueill/', $name);
        

        
        $this->pictureAcceuil = $name;

        return $this;
    }

    /**
     * Get pictureAcceuil
     *
     * @return string
     */
    public function getPictureAcceuil()
    {
        return $this->pictureAcceuil;
    }
    
    public function renamefile($file)
    {
        
        return $name = md5(uniqid()).'.'.$file->getClientOriginalExtension();
        
    }

    /**
     * Add video
     *
     * @param \DJ\viewBundle\Entity\Videos $video
     *
     * @return Figures
     */
    public function addVideofigure(\DJ\viewBundle\Entity\Videos $video)
    {
        $this->videofigure[]= $video;
        $video->setFigurevideo($this);

        

        return $this;
    }

    /**
     * Remove video
     *
     * @param \DJ\viewBundle\Entity\Videos $video
     */
    public function removeVideofigure(\DJ\viewBundle\Entity\Videos $video)
    {
        $this->videofigure->removeElement($video);
    }

    /**
     * Get video
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideofigure()
    {
        return $this->videofigure;
    }

    /**
     * Set users
     *
     * @param \DJ\usersecurityBundle\Entity\User $users
     *
     * @return Figures
     */
    public function setUsers(\DJ\usersecurityBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \DJ\usersecurityBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add comment
     *
     * @param \DJ\viewBundle\Entity\Comments $comment
     *
     * @return Figures
     */
    public function addComment(\DJ\viewBundle\Entity\Comments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DJ\viewBundle\Entity\Comments $comment
     */
    public function removeComment(\DJ\viewBundle\Entity\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set categories
     *
     * @param string $categories
     *
     * @return Figures
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
