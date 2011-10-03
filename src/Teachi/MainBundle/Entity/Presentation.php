<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Presentation
 *
 * @ORM\Table(name="Presentation")
 * @ORM\Entity
 */
class Presentation
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
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Book", referencedColumnName="id")
     * })
     */
    private $book;



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
     * Set book
     *
     * @param Teachi\MainBundle\Entity\Book $book
     */
    public function setBook(\Teachi\MainBundle\Entity\Book $book)
    {
        $this->book = $book;
    }

    /**
     * Get book
     *
     * @return Teachi\MainBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
}