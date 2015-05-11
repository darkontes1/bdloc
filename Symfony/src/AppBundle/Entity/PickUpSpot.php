<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PickUpSpot
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PickUpSpotRepository")
 */
class PickUpSpot
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
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="CP", type="integer")
     */
    private $cP;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEntreprise", type="string", length=255)
     */
    private $nomEntreprise;


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
     * Set adresse
     *
     * @param string $adresse
     * @return PickUpSpot
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cP
     *
     * @param integer $cP
     * @return PickUpSpot
     */
    public function setCP($cP)
    {
        $this->cP = $cP;

        return $this;
    }

    /**
     * Get cP
     *
     * @return integer 
     */
    public function getCP()
    {
        return $this->cP;
    }

    /**
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     * @return PickUpSpot
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }
}
