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
     * @ORM\Column(name="figure_description", type="string", length=255)
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
}
