<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AuthorRepository")
 */
class Author
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="surnom", type="string", length=255)
     */
    private $surnom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeces", type="datetime")
     */
    private $dateDeces;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idBel", type="integer")
     */
    private $idBel;


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
     * Set nom
     *
     * @param string $nom
     * @return Author
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Author
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set surnom
     *
     * @param string $surnom
     * @return Author
     */
    public function setSurnom($surnom)
    {
        $this->surnom = $surnom;

        return $this;
    }

    /**
     * Get surnom
     *
     * @return string 
     */
    public function getSurnom()
    {
        return $this->surnom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Author
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateDeces
     *
     * @param \DateTime $dateDeces
     * @return Author
     */
    public function setDateDeces($dateDeces)
    {
        $this->dateDeces = $dateDeces;

        return $this;
    }

    /**
     * Get dateDeces
     *
     * @return \DateTime 
     */
    public function getDateDeces()
    {
        return $this->dateDeces;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Author
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Author
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set idBel
     *
     * @param integer $idBel
     * @return Author
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
}
