<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Slide
 *
 * @ORM\Table(name="Slide")
 * @ORM\Entity
 */
class Slide
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $number
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var Presentation
     *
     * @ORM\ManyToOne(targetEntity="Presentation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Presentation", referencedColumnName="id")
     * })
     */
    private $presentation;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param integer $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set presentation
     *
     * @param Teachi\MainBundle\Entity\Presentation $presentation
     */
    public function setPresentation(\Teachi\MainBundle\Entity\Presentation $presentation)
    {
        $this->presentation = $presentation;
    }

    /**
     * Get presentation
     *
     * @return Teachi\MainBundle\Entity\Presentation 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }
}