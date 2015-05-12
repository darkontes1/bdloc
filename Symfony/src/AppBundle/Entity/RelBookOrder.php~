<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RelBookOrder
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RelBookOrderRepository")
 */
class RelBookOrder
{

     /** @ORM\Id @ORM\ManyToOne(targetEntity="Commande") */
    private $order;

    /** @ORM\Id @ORM\ManyToOne(targetEntity="Book") */
    private $book;


    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOrder", type="datetime")
     */
    private $dateOrder;


    /**
     * Set status
     *
     * @param boolean $status
     * @return RelBookOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateOrder
     *
     * @param \DateTime $dateOrder
     * @return RelBookOrder
     */
    public function setDateOrder($dateOrder)
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    /**
     * Get dateOrder
     *
     * @return \DateTime 
     */
    public function getDateOrder()
    {
        return $this->dateOrder;
    }
}
