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
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReadersRelations" , mappedBy="reader" , cascade={"all"})
     */
    private $readersRelations;

    private $books;

    public function __toString()
    {
        return $this->name;
    }

    public function addPo($ProductOrder)
    {
        $this->readersRelations[] = $ProductOrder;
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

    /**
     * @return ReadersRelations
     */
    public function getReadersRelations()
    {
        $books = [];

        if(count($this->readersRelations)) {
            foreach ($this->readersRelations as $p) {
                $books[] = $p->getBook();
            }
        }

        return $books;
    }

    /**
     * @param ReadersRelations $readersRelations
     */
    public function setReadersRelations($readersRelations)
    {
        foreach($readersRelations as $p)
        {
            $po = new ReadersRelations();

            $po->setBook($p);
            $po->setReader($this);

            $this->addPo($po);
        }
    }
}
