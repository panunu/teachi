<?php

namespace Teachi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachi\MainBundle\Entity\Author
 *
 * @ORM\Table(name="Author")
 * @ORM\Entity
 */
class Author
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
     * @var string $familyname
     *
     * @ORM\Column(name="familyName", type="string", length=100, nullable=false)
     */
    private $familyname;

    /**
     * @var string $givenname
     *
     * @ORM\Column(name="givenName", type="string", length=100, nullable=false)
     */
    private $givenname;

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Account", referencedColumnName="id")
     * })
     */
    private $account;



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
     * Set familyname
     *
     * @param string $familyname
     */
    public function setFamilyname($familyname)
    {
        $this->familyname = $familyname;
    }

    /**
     * Get familyname
     *
     * @return string 
     */
    public function getFamilyname()
    {
        return $this->familyname;
    }

    /**
     * Set givenname
     *
     * @param string $givenname
     */
    public function setGivenname($givenname)
    {
        $this->givenname = $givenname;
    }

    /**
     * Get givenname
     *
     * @return string 
     */
    public function getGivenname()
    {
        return $this->givenname;
    }

    /**
     * Set account
     *
     * @param Teachi\MainBundle\Entity\Account $account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Get account
     *
     * @return Teachi\MainBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}