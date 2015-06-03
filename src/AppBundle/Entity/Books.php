<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Books
 *
 * @ORM\Entity
 * @ORM\Table(name="Books")
 */
class Books
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     *
     */
    private $author;

    /**
     * @var ReadersRelations
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReadersRelations" , mappedBy="book" , cascade={"all"})
     */
    private $readersRelations;

    public function __toString()
    {
        return $this->name;
    }

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
     * Set name
     *
     * @param string $name
     * @return Books
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Books
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return ReadersRelations
     */
    public function getReadersRelations()
    {
        return $this->readersRelations;
    }

    /**
     * @param ReadersRelations $readersRelations
     */
    public function setReadersRelations($readersRelations)
    {
        $this->readersRelations = $readersRelations;
    }
}
