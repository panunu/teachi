<?php

namespace Teachi\MaterialBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    \Teachi\FrameworkBundle\Entity\AbstractEntity as Entity;

/**
 * Teachi\MaterialBundle\Entity\Content
 *
 * @ORM\Table(name="Content")
 * @ORM\Entity
 */
class Content extends Entity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer $order
     *
     * @ORM\Column(name="order", type="integer", nullable=false)
     */
    protected $order;

    /**
     * @var text $content
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    protected $content;

    /**
     * @var Chapter
     *
     * @ORM\ManyToOne(targetEntity="Chapter", inversedBy="contents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Chapter", referencedColumnName="id")
     * })
     */
    protected $chapter;

    
    public function __toString()
    {
        return "{$this->content}";
    }
}