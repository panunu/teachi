<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Content
 *
 * @ORM\Table(name="Content")
 * @ORM\Entity
 */
class Content
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
     * @var text $content
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var Chapter
     *
     * @ORM\ManyToOne(targetEntity="Chapter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Chapter", referencedColumnName="id")
     * })
     */
    private $chapter;



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
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set chapter
     *
     * @param Teachi\MainBundle\Entity\Chapter $chapter
     */
    public function setChapter(\Teachi\MainBundle\Entity\Chapter $chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * Get chapter
     *
     * @return Teachi\MainBundle\Entity\Chapter 
     */
    public function getChapter()
    {
        return $this->chapter;
    }
}