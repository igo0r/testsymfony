<?php
/**
 * Data Transformer file
 *
 * PHP version 5.3
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage DataTransformer
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Data Transformer Class
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage DataTransformer
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */
class RoleDataTransformer implements DataTransformerInterface
{

    /**
    * @var ObjectManager
    */
    private $om;

    /**
     * User types
     *
     * @var array
     */
    protected $user_roles = array(
        1  => 'ROLE_USER',
        2  => 'ROLE_SUPER_ADMIN'
    );

    /**
    * @param ObjectManager $om
    */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
    * Transforms an object ($value) to a string (number).
    *
    * @param array $value
     *
    * @return int
    */
    public function transform($value)
    {
        $value = array_shift($value);

        return array_search($value, $this->user_roles);
    }

    /**
    * Transforms a string (number) to an object (issue).
    *
    * @param  string $value
    *
    * @return bool
    */
    public function reverseTransform($value)
    {
        return array_key_exists($value, $this->user_roles)?array($this->user_roles[$value]):array();
    }
}