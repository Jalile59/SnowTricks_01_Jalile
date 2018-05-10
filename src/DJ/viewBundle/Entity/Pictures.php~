<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pictures
 *
 * @ORM\Table(name="pictures")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\PicturesRepository")
 */
class Pictures
{   
    /**
     * @ORM\ManyToOne(targetEntity=Figures::class, inversedBy="picture")
     * 
     */
    
    
    private $figure;
    
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
     * @ORM\Column(name="picture_link", type="string", length=255)
     */
    private $pictureLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="picture_createdate", type="datetime")
     */
    private $pictureCreatedate;

    public function __construct( ) {
        $this->setPictureCreatedate(new \DateTime());
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
     * Set pictureLink
     *
     * @param string $pictureLink
     *
     * @return Pictures
     */
    public function setPictureLink( $pictureLink)
    {
        
        $nname = $this->newname($pictureLink);
        
        $test = $pictureLink->getClientOriginalExtension();
        
        $pictureLink->move('../web/images/', $nname);
        
        $this->pictureLink = $nname;


        return $this;
    }

    /**
     * Get pictureLink
     *
     * @return string
     */
    public function getPictureLink()
    {
        return $this->pictureLink;
    }

    /**
     * Set pictureCreatedate
     *
     * @param \DateTime $pictureCreatedate
     *
     * @return Pictures
     */
    public function setPictureCreatedate($pictureCreatedate)
    {
        $this->pictureCreatedate = $pictureCreatedate;

        return $this;
    }

    /**
     * Get pictureCreatedate
     *
     * @return \DateTime
     */
    public function getPictureCreatedate()
    {
        return $this->pictureCreatedate;
    }

    /**
     * Set figure
     *
     * @param \DJ\viewBundle\Entity\Figures $figure
     *
     * @return Pictures
     */
    public function setFigure(\DJ\viewBundle\Entity\Figures $figure )
    {
        $this->figure = $figure;

        return $this;
    }

    /**
     * Get figure
     *
     * @return \DJ\viewBundle\Entity\Figures
     */
    public function getFigure()
    {
        return $this->figure;
    }
    
    public function newname($pictureLink){
            
            
        $name = md5(uniqid()).'.'.$pictureLink->getClientOriginalExtension();

        

        
        
        
        return $name;
        
    }



}
