<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Bullet
 *
 * @ORM\Table(name="Bullet")
 * @ORM\Entity
 */
class Bullet
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
     * @var integer $order
     *
     * @ORM\Column(name="order", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var Slide
     *
     * @ORM\ManyToOne(targetEntity="Slide")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Slide", referencedColumnName="id")
     * })
     */
    private $slide;

    /**
     * @var Content
     *
     * @ORM\ManyToOne(targetEntity="Content")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Content", referencedColumnName="id")
     * })
     */
    private $content;



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
     * Set order
     *
     * @param integer $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * Get order
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set slide
     *
     * @param Teachi\MainBundle\Entity\Slide $slide
     */
    public function setSlide(\Teachi\MainBundle\Entity\Slide $slide)
    {
        $this->slide = $slide;
    }

    /**
     * Get slide
     *
     * @return Teachi\MainBundle\Entity\Slide 
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * Set content
     *
     * @param Teachi\MainBundle\Entity\Content $content
     */
    public function setContent(\Teachi\MainBundle\Entity\Content $content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return Teachi\MainBundle\Entity\Content 
     */
    public function getContent()
    {
        return $this->content;
    }
}