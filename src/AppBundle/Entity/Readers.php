<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Repositories\ReadersRepository;
use AppBundle\Entity\ReadersRelations;
/**
 * Readers
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repositories\ReadersRepository")
 * @ORM\Table(name="Readers")
 */
class Readers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *      */
    private $name;

    /**
     * @var ReadersRelations
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\ReadersRelations" , mappedBy="Readers" , cascade={"all"})
     */
    private $book;

    private $books;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->books = new ArrayCollection();

    }

    public function __toString()
    {
        return $this->name;
    }

    public function getBook()
    {
        $books = new ArrayCollection();

        foreach($books as $p)
        {
            $books[] = $p->getBook();
        }

        return $books;
    }

    public function setBook($books)
    {
        foreach($books as $p)
        {
            $po = new ReadersRelations();

            $po->setBook($p);
            $po->setReader($this);

            $this->addPo($po);
        }

    }

    public function addPo($ProductOrder)
    {
        $this->book[] = $ProductOrder;
    }

    public function removePo($ProductOrder)
    {
        return $this->book->removeElement($ProductOrder);
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
     * @return Readers
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
}
