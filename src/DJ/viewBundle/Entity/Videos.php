<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videos
 *
 * @ORM\Table(name="videos")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\VideosRepository")
 */
class Videos
{
    /**
     * @ORM\ManyToOne(targetEntity=Figures::class, inversedBy="videofigure")
     * 
     */
    private $figurevideo;
    
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
     * @ORM\Column(name="videolink", type="string", length=255)
     */
    private $videolink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="videocreatedate", type="datetime")
     */
    private $videocreatedate;

   public function __construct() {
       $this->videocreatedate= new \DateTime();
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
     * Set videolink
     *
     * @param string $videolink
     *
     * @return Videos
     */
    public function setVideolink($videolink)
    {   
        $long = strlen($videolink);
        $video = substr($videolink, 30, $long);
                
        $this->videolink = $video;
        
        return $this;
    }

    /**
     * Get videolink
     *
     * @return string
     */
    public function getVideolink()
    {
        return $this->videolink;
    }

    /**
     * Set videocreatedate
     *
     * @param \DateTime $videocreatedate
     *
     * @return Videos
     */
    public function setVideocreatedate($videocreatedate)
    {
        $this->videocreatedate = $videocreatedate;

        return $this;
    }

    /**
     * Get videocreatedate
     *
     * @return \DateTime
     */
    public function getVideocreatedate()
    {
        return $this->videocreatedate;
    }

    /**
     * Set figure
     *
     * @param \DJ\viewBundle\Entity\Figures $figure
     *
     * @return Videos
     */
    public function setFigure(\DJ\viewBundle\Entity\Figures $figure = null)
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
    
    

    /**
     * Set figurevideo
     *
     * @param \DJ\viewBundle\Entity\Figures $figurevideo
     *
     * @return Videos
     */
    public function setFigurevideo(\DJ\viewBundle\Entity\Figures $figurevideo = null)
    {
        $this->figurevideo = $figurevideo;

        return $this;
    }

    /**
     * Get figurevideo
     *
     * @return \DJ\viewBundle\Entity\Figures
     */
    public function getFigurevideo()
    {
        return $this->figurevideo;
    }
}
