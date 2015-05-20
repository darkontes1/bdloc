<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User implements UserInterface
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
     * @Assert\NotBlank(message=" Veuillez renseigner un nom")
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @Assert\NotBlank(message=" Veuillez renseigner un prenom")
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @Assert\NotBlank(message=" Veuillez renseigner un email")
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotBlank(message=" Veuillez renseigner un username")
     * @Assert\Length(
     *      min = "3",
     *      max = "255",
     *      minMessage = " Votre titre doit faire au moins {{ limit }} caractères",
     *      maxMessage = " Votre titre ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @Assert\NotBlank(message=" Veuillez renseigner un mot de passe")
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     *@Assert\Length(
     *      min = "10",
     *      max = "10",
     *      minMessage = "Votre nom doit faire au moins 10 caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que 10 caractères"
     * )
     * @Assert\Regex(
     *      "/^0[1-9][0-9]{8}/",
     *      message=" Votre téléphone n'est pas valide"
     * )
     * @Assert\NotBlank(message=" Veuillez renseigner un telephone valide")
     * @ORM\Column(name="telephone", type="string", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @Assert\NotBlank(message=" Veuillez renseigner une adresse")
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="CP", type="string", length=255)
     */
    private $CP;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;


    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModified", type="datetime")
     */
    private $dateModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLastLogin", type="datetime")
     */
    private $dateLastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="raisons", type="string", length=255, nullable=true)
     */
    private $raisons;

    /**
   * @ORM\OneToMany(targetEntity="Commande", mappedBy="user")
   * @ORM\JoinColumn(nullable=false)
   */
    private $commands;

    /**
   * @ORM\OneToMany(targetEntity="Fine", mappedBy="user")
   * @ORM\JoinColumn(nullable=false)
   */
    private $fines;

    /**
     * @ORM\OneToMany(targetEntity="Adress", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresses;

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
     * @return User
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
     * @return User
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return User
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return User
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set raisons
     *
     * @param string $raisons
     * @return User
     */
    public function setRaisons($raisons)
    {
        $this->raisons = $raisons;

        return $this;
    }

    /**
     * Get raisons
     *
     * @return string 
     */
    public function getRaisons()
    {
        return $this->raisons;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commands = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commands
     *
     * @param \AppBundle\Entity\Commande $commands
     * @return User
     */
    public function addCommand(\AppBundle\Entity\Commande $commands)
    {
        $this->commands[] = $commands;

        return $this;
    }

    /**
     * Remove commands
     *
     * @param \AppBundle\Entity\Commande $commands
     */
    public function removeCommand(\AppBundle\Entity\Commande $commands)
    {
        $this->commands->removeElement($commands);
    }

    /**
     * Get commands
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Add fines
     *
     * @param \AppBundle\Entity\Fine $fines
     * @return User
     */
    public function addFine(\AppBundle\Entity\Fine $fines)
    {
        $this->fines[] = $fines;

        return $this;
    }

    /**
     * Remove fines
     *
     * @param \AppBundle\Entity\Fine $fines
     */
    public function removeFine(\AppBundle\Entity\Fine $fines)
    {
        $this->fines->removeElement($fines);
    }

    /**
     * Get fines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFines()
    {
        return $this->fines;
    }

    /**
     * Add adresses
     *
     * @param \AppBundle\Entity\Adress $adresses
     * @return User
     */
    public function addAdress(\AppBundle\Entity\Adress $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \AppBundle\Entity\Adress $adresses
     */
    public function removeAdress(\AppBundle\Entity\Adress $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Set dateModified
     *
     * @param \DateTime $dateModified
     * @return User
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime 
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set dateLastLogin
     *
     * @param \DateTime $dateLastLogin
     * @return User
     */
    public function setDateLastLogin($dateLastLogin)
    {
        $this->dateLastLogin = $dateLastLogin;

        return $this;
    }

    /**
     * Get dateLastLogin
     *
     * @return \DateTime 
     */
    public function getDateLastLogin()
    {
        return $this->dateLastLogin;
    }
    public function eraseCredentials(){}

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
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
     * Set CP
     *
     * @param string $cP
     * @return User
     */
    public function setCP($cP)
    {
        $this->CP = $cP;

        return $this;
    }

    /**
     * Get CP
     *
     * @return string 
     */
    public function getCP()
    {
        return $this->CP;
    }
}
