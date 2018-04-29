<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * figure
 *
 * @ORM\Table(name="figure")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\figureRepository")
 */
class figure
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
     * @ORM\Column(name="figure_nom", type="string", length=255, nullable=true, unique=true)
     */
    private $figureNom;

    /**
     * @var string
     *
     * @ORM\Column(name="figure_description", type="text", nullable=true)
     */
    private $figureDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="figure_groupe", type="string", length=255)
     */
    private $figureGroupe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="figure_datecreate", type="datetimetz", nullable=true)
     */
    private $figureDatecreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="figure_updatedate", type="datetimetz")
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
     * Set figureNom
     *
     * @param string $figureNom
     *
     * @return figure
     */
    public function setFigureNom($figureNom)
    {
        $this->figureNom = $figureNom;

        return $this;
    }

    /**
     * Get figureNom
     *
     * @return string
     */
    public function getFigureNom()
    {
        return $this->figureNom;
    }

    /**
     * Set figureDescription
     *
     * @param string $figureDescription
     *
     * @return figure
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
     * Set figureGroupe
     *
     * @param string $figureGroupe
     *
     * @return figure
     */
    public function setFigureGroupe($figureGroupe)
    {
        $this->figureGroupe = $figureGroupe;

        return $this;
    }

    /**
     * Get figureGroupe
     *
     * @return string
     */
    public function getFigureGroupe()
    {
        return $this->figureGroupe;
    }

    /**
     * Set figureDatecreate
     *
     * @param \DateTime $figureDatecreate
     *
     * @return figure
     */
    public function setFigureDatecreate($figureDatecreate)
    {
        $this->figureDatecreate = $figureDatecreate;

        return $this;
    }

    /**
     * Get figureDatecreate
     *
     * @return \DateTime
     */
    public function getFigureDatecreate()
    {
        return $this->figureDatecreate;
    }

    /**
     * Set figureUpdatedate
     *
     * @param \DateTime $figureUpdatedate
     *
     * @return figure
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
}

