<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SerieRepository")
 */
class Serie
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

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
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255)
     */
    private $langue;

    /**
   * @ORM\OneToMany(targetEntity="Book", mappedBy="Serie")
   * @ORM\JoinColumn(nullable=false)
   */
    private $books;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="series")
     */
    private $category;


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
     * Set title
     *
     * @param string $title
     * @return Serie
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
     * Set style
     *
     * @param string $style
     * @return Serie
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string 
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Serie
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Serie
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set planche
     *
     * @param string $planche
     * @return Serie
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
     * @return Serie
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
     * Set langue
     *
     * @param string $langue
     * @return Serie
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add books
     *
     * @param \AppBundle\Entity\Book $books
     * @return Serie
     */
    public function addBook(\AppBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \AppBundle\Entity\Book $books
     */
    public function removeBook(\AppBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Serie
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
