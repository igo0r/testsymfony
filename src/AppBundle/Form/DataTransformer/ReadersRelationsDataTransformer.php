<?php
/**
 * Data Transformer file
 *
 * PHP version 5.3
 *
 * @category testsymfony
 * @package AppBundle
 * @subpackage DataTransformer
 * @author Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright 2011-2015 (http://test.com). All rights reserved.
 * @license http://test.com Commercial
 * @link http://test.com
 */
namespace AppBundle\Form\DataTransformer;
use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Exception\TransformationFailedException;
/**
 * Data Transformer Class
 *
 * @category testsymfony
 * @package AppBundle
 * @subpackage DataTransformer
 * @author Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright 2011-2015 (http://test.com). All rights reserved.
 * @license http://test.com Commercial
 * @link http://test.com
 */
class ReadersRelationsDataTransformer implements DataTransformerInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var string
     */
    private $class;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->class = $class;
    }

    /**
     * Transforms an object (use) to a string (id).
     *
     * @param array $array
     * @return ArrayCollection
     */
    public function transform($array)
    {
        $newArray = array();

        if (!($array instanceof PersistentCollection)) {
            return new ArrayCollection();
        }

        foreach ($array as $key => $value) {
            $newArray[] = $value;
        }

        return new ArrayCollection($newArray);
    }

    /**
     * Transforms a string (id) to an object (item).
     *
     * @param string $id
     * @return PersistentCollection|ArrayCollection
     */
    public function reverseTransform($array)
    {
        $newArray = array();

        if (!$array) {
            return new ArrayCollection();
        }

        foreach ($array as $key => $value) {
            $item = $this->em
                ->getRepository($this->class)
                ->findOneBy(array('id' => $value))
            ;

            if (!is_null($item)) {
                $newArray[$key] = $item;
            }
        }

        return new PersistentCollection($this->em, $this->class, new ArrayCollection($newArray));
    }
}