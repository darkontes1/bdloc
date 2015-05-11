<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BookRepository")
 */
class Book
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
     * @ORM\Column(name="num", type="integer")
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=255)
     */
    private $editor;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="exlibris", type="string", length=255)
     */
    private $exlibris;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPages", type="integer")
     */
    private $nbPages;

    /**
     * @var string
     *
     * @ORM\Column(name="planche", type="string", length=255)
     */
    private $planche;

    /**
     * @var integer
     *
     * @ORM\Column(name="idBel", type="integer")
     */
    private $idBel;

    /**
     * @var integer
     *
     * @ORM\Column(name="exemplaires", type="integer")
     */
    private $exemplaires;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="books")
     */
    private $dessinateur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="books")
     */
    private $coloriste;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="books")
     */
    private $scenariste;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Serie", inversedBy="books")
     */
    private $serie;




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
     * Set num
     *
     * @param integer $num
     * @return Book
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Set editor
     *
     * @param string $editor
     * @return Book
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string 
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Book
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return Book
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set exlibris
     *
     * @param string $exlibris
     * @return Book
     */
    public function setExlibris($exlibris)
    {
        $this->exlibris = $exlibris;

        return $this;
    }

    /**
     * Get exlibris
     *
     * @return string 
     */
    public function getExlibris()
    {
        return $this->exlibris;
    }

    /**
     * Set nbPages
     *
     * @param integer $nbPages
     * @return Book
     */
    public function setNbPages($nbPages)
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    /**
     * Get nbPages
     *
     * @return integer 
     */
    public function getNbPages()
    {
        return $this->nbPages;
    }

    /**
     * Set planche
     *
     * @param string $planche
     * @return Book
     */
    public function setPlanche($planche)
    {
        $this->planche = $planche;

        return $this;
    }

    /**
     * Get planche
     *
     * @return string 
     */
    public function getPlanche()
    {
        return $this->planche;
    }

    /**
     * Set idBel
     *
     * @param integer $idBel
     * @return Book
     */
    public function setIdBel($idBel)
    {
        $this->idBel = $idBel;

        return $this;
    }

    /**
     * Get idBel
     *
     * @return integer 
     */
    public function getIdBel()
    {
        return $this->idBel;
    }

    /**
     * Set exemplaires
     *
     * @param integer $exemplaires
     * @return Book
     */
    public function setExemplaires($exemplaires)
    {
        $this->exemplaires = $exemplaires;

        return $this;
    }

    /**
     * Get exemplaires
     *
     * @return integer 
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }


    /**
     * Set dessinateur
     *
     * @param \AppBundle\Entity\Author $dessinateur
     * @return Book
     */
    public function setDessinateur(\AppBundle\Entity\Author $dessinateur = null)
    {
        $this->dessinateur = $dessinateur;

        return $this;
    }

    /**
     * Get dessinateur
     *
     * @return \AppBundle\Entity\Author 
     */
    public function getDessinateur()
    {
        return $this->dessinateur;
    }

    /**
     * Set coloriste
     *
     * @param \AppBundle\Entity\Author $coloriste
     * @return Book
     */
    public function setColoriste(\AppBundle\Entity\Author $coloriste = null)
    {
        $this->coloriste = $coloriste;

        return $this;
    }

    /**
     * Get coloriste
     *
     * @return \AppBundle\Entity\Author 
     */
    public function getColoriste()
    {
        return $this->coloriste;
    }

    /**
     * Set scenariste
     *
     * @param \AppBundle\Entity\Author $scenariste
     * @return Book
     */
    public function setScenariste(\AppBundle\Entity\Author $scenariste = null)
    {
        $this->scenariste = $scenariste;

        return $this;
    }

    /**
     * Get scenariste
     *
     * @return \AppBundle\Entity\Author 
     */
    public function getScenariste()
    {
        return $this->scenariste;
    }

    /**
     * Set serie
     *
     * @param \AppBundle\Entity\Serie $serie
     * @return Book
     */
    public function setSerie(\AppBundle\Entity\Serie $serie = null)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return \AppBundle\Entity\Serie 
     */
    public function getSerie()
    {
        return $this->serie;
    }
}
