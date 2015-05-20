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

     /** @ORM\Id @ORM\ManyToOne(targetEntity="Commande")
     *orphanRemoval=true

      */
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

    /**
     * Set order
     *
     * @param \AppBundle\Entity\Commande $order
     * @return RelBookOrder
     */
    public function setOrder(\AppBundle\Entity\Commande $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \AppBundle\Entity\Commande 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     * @return RelBookOrder
     */
    public function setBook(\AppBundle\Entity\Book $book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \AppBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
}
