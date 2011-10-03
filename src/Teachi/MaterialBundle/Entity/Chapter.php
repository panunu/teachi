<?php

namespace Teachi\MaterialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MaterialBundle\Entity\Chapter
 *
 * @ORM\Table(name="Chapter")
 * @ORM\Entity
 */
class Chapter
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    private $title;

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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set book
     *
     * @param Teachi\MaterialBundle\Entity\Book $book
     */
    public function setBook(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Get book
     *
     * @return Teachi\MaterialBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
}