<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\MediaRepository")
 */
class Media
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
     * @var string
     *
     * @ORM\Column(name="media_lien", type="text")
     */
    private $mediaLien;

    /**
     * @var string
     *
     * @ORM\Column(name="media_type", type="string", length=255, nullable=true)
     */
    private $mediaType;

    /**
     * @var string
     *
     * @ORM\Column(name="media_nom", type="string", length=255)
     */
    private $mediaNom;

    /**
     * @var int
     *
     * @ORM\Column(name="figure_id", type="integer", nullable=true)
     */
    private $figureId;


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
     * Set mediaLien
     *
     * @param string $mediaLien
     *
     * @return Media
     */
    public function setMediaLien($mediaLien)
    {
        $this->mediaLien = $mediaLien;

        return $this;
    }

    /**
     * Get mediaLien
     *
     * @return string
     */
    public function getMediaLien()
    {
        return $this->mediaLien;
    }

    /**
     * Set mediaType
     *
     * @param string $mediaType
     *
     * @return Media
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * Get mediaType
     *
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set mediaNom
     *
     * @param string $mediaNom
     *
     * @return Media
     */
    public function setMediaNom($mediaNom)
    {
        $this->mediaNom = $mediaNom;

        return $this;
    }

    /**
     * Get mediaNom
     *
     * @return string
     */
    public function getMediaNom()
    {
        return $this->mediaNom;
    }

    /**
     * Set figureId
     *
     * @param integer $figureId
     *
     * @return Media
     */
    public function setFigureId($figureId)
    {
        $this->figureId = $figureId;

        return $this;
    }

    /**
     * Get figureId
     *
     * @return int
     */
    public function getFigureId()
    {
        return $this->figureId;
    }
}

