<?php

namespace Teachi\MaterialBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    \Teachi\FrameworkBundle\Entity\AbstractEntity as Entity;

/**
 * Teachi\MaterialBundle\Entity\Chapter
 *
 * @ORM\Table(name="Chapter")
 * @ORM\Entity
 */
class Chapter extends Entity
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
     * @var integer $number
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    protected $number;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    protected $title;

    /**
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="chapters")
     * @ORM\JoinColumn(name="Book", referencedColumnName="id")
     */
    protected $book;
    
}