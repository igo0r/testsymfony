<?php
/**
 * User repository file
 *
 * PHP version 5.3
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage Repository
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */

namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

/**
 * User Repository Class
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage Repository
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */
class UserRepository extends EntityRepository
{
    /**
     * Returns the list of bugs
     *
     * @param integer $userId
     *
     * @return array
     */
    public function getList()
    {
        $users = $this->getEntityManager()->createQueryBuilder()
            ->select('usr.id', 'usr.username', 'usr.email', 'usr.roles')
            ->from('AppBundle:User', 'usr')
            ->getQuery()
            ->getScalarResult();

        foreach($users as &$user){
            $user['roles'] = unserialize($user['roles']);
            $user['roles'] = array_shift($user['roles']);
        }

        return $users;
    }
}
