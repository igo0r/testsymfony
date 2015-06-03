<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ReadersRelations
 *
 * @ORM\Entity
 * @ORM\Table(name="ReadersRelations")
 */
class ReadersRelations
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
     * @var Books
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Books", inversedBy="ReadersRelations")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    private $book;

    /**
     * @var Readers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Readers", inversedBy="ReadersRelations")
     * @ORM\JoinColumn(name="reader_id", referencedColumnName="id")
     */
    private $reader;


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
     * Set book
     *
     * @param Books $book
     * @return ReadersRelations
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return Books
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set reader
     *
     * @param Readers $reader
     * @return ReadersRelations
     */
    public function setReader($reader)
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * Get reader
     *
     * @return Readers
     */
    public function getReader()
    {
        return $this->reader;
    }
}
