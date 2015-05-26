<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PaiementRepository")
 */
class Paiement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ccn", type="integer")
     */
    private $ccn;

    /**
     * @var integer
     *
     * @ORM\Column(name="cvv", type="integer")
     */
    private $cvv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="exp", type="datetime")
     */
    private $exp;

    /**
     * @var integer
     *
     * @ORM\Column(name="amo", type="integer")
     */
    private $amo;

    /**
     * @var string
     *
     * @ORM\Column(name="cur", type="string", length=255)
     */
    private $cur;

    /**
     * @var string
     *
     * @ORM\Column(name="mid", type="string", length=255)
     */
    private $mid;

    /**
     * @var integer
     *
     * @ORM\Column(name="tim", type="integer")
     */
    private $tim;

    /**
     * @var string
     *
     * @ORM\Column(name="tok", type="string", length=255)
     */
    private $tok;

    /**
     * @var string
     *
     * @ORM\Column(name="tes", type="string", length=255)
     */
    private $tes;



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
     * Set ccn
     *
     * @param integer $ccn
     * @return Paiement
     */
    public function setCcn($ccn)
    {
        $this->ccn = $ccn;

        return $this;
    }

    /**
     * Get ccn
     *
     * @return integer 
     */
    public function getCcn()
    {
        return $this->ccn;
    }

    /**
     * Set cvv
     *
     * @param integer $cvv
     * @return Paiement
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get cvv
     *
     * @return integer 
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set exp
     *
     * @param \DateTime $exp
     * @return Paiement
     */
    public function setExp($exp)
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * Get exp
     *
     * @return \DateTime 
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * Set amo
     *
     * @param integer $amo
     * @return Paiement
     */
    public function setAmo($amo)
    {
        $this->amo = $amo;

        return $this;
    }

    /**
     * Get amo
     *
     * @return integer 
     */
    public function getAmo()
    {
        return $this->amo;
    }

    /**
     * Set cur
     *
     * @param string $cur
     * @return Paiement
     */
    public function setCur($cur)
    {
        $this->cur = $cur;

        return $this;
    }

    /**
     * Get cur
     *
     * @return string 
     */
    public function getCur()
    {
        return $this->cur;
    }

    /**
     * Set mid
     *
     * @param string $mid
     * @return Paiement
     */
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * Get mid
     *
     * @return string 
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Set tim
     *
     * @param integer $tim
     * @return Paiement
     */
    public function setTim($tim)
    {
        $this->tim = $tim;

        return $this;
    }

    /**
     * Get tim
     *
     * @return integer 
     */
    public function getTim()
    {
        return $this->tim;
    }

    /**
     * Set tok
     *
     * @param string $tok
     * @return Paiement
     */
    public function setTok($tok)
    {
        $this->tok = $tok;

        return $this;
    }

    /**
     * Get tok
     *
     * @return string 
     */
    public function getTok()
    {
        return $this->tok;
    }

    /**
     * Set tes
     *
     * @param string $tes
     * @return Paiement
     */
    public function setTes($tes)
    {
        $this->tes = $tes;

        return $this;
    }

    /**
     * Get tes
     *
     * @return string 
     */
    public function getTes()
    {
        return $this->tes;
    }
}
