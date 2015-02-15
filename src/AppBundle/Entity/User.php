<?php
/**
 * User Entity file
 *
 * PHP version 5.3
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage Entity
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User Entity Class
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage DataFixtures
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}