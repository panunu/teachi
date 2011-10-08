<?php

namespace Teachi\MaterialBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    \Teachi\MainBundle\Entity\Author,
    \Teachi\FrameworkBundle\Entity\AbstractEntity as Entity;

/**
 * Teachi\MaterialBundle\Entity\Book
 *
 * @ORM\Table(name="Book")
 * @ORM\Entity
 */
class Book extends Entity
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=100, nullable=false)
     */
    protected $link;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Teachi\MainBundle\Entity\Author")
     * @ORM\JoinColumn(name="Author", referencedColumnName="id")
     */
    protected $author;
    
    /**
     * @var array
     * 
     * @ORM\OneToMany(targetEntity="Chapter", mappedBy="book")
     */
    protected $chapters;

}