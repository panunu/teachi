<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Book
 *
 * @ORM\Table(name="Book")
 * @ORM\Entity
 */
class Book
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=100, nullable=false)
     */
    private $link;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Author", referencedColumnName="id")
     * })
     */
    private $author;



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
     * Set link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set author
     *
     * @param Teachi\MainBundle\Entity\Author $author
     */
    public function setAuthor(\Teachi\MainBundle\Entity\Author $author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return Teachi\MainBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}