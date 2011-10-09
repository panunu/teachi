<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    \Teachi\FrameworkBundle\Entity\AbstractEntity as Entity;

/**
 * Teachi\MainBundle\Entity\Author
 *
 * @ORM\Table(name="Author")
 * @ORM\Entity
 */
class Author extends Entity
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
     * @var string $familyName
     *
     * @ORM\Column(name="familyName", type="string", length=100, nullable=false)
     */
    protected $familyName;

    /**
     * @var string $givenName
     *
     * @ORM\Column(name="givenName", type="string", length=100, nullable=false)
     */
    protected $givenName;

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Account", referencedColumnName="id")
     * })
     */
    protected $account;
    
}