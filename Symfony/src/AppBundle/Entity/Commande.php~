<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbBD", type="integer")
     */
    private $nbBD;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="commands")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PickUpSpot", inversedBy="orders")
     */
    private $pickupspot;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nbBD
     *
     * @param integer $nbBD
     * @return Commande
     */
    public function setNbBD($nbBD)
    {
        $this->nbBD = $nbBD;

        return $this;
    }

    /**
     * Get nbBD
     *
     * @return integer 
     */
    public function getNbBD()
    {
        return $this->nbBD;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Commande
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pickupspot
     *
     * @param \AppBundle\Entity\PickUpSpot $pickupspot
     * @return Commande
     */
    public function setPickupspot(\AppBundle\Entity\PickUpSpot $pickupspot = null)
    {
        $this->pickupspot = $pickupspot;

        return $this;
    }

    /**
     * Get pickupspot
     *
     * @return \AppBundle\Entity\PickUpSpot 
     */
    public function getPickupspot()
    {
        return $this->pickupspot;
    }
}
