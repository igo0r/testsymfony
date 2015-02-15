<?php
/**
 * Data Fixtures file
 *
 * PHP version 5.3
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage DataFixtures
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

/**
 * Data Fixtures Class
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage DataFixtures
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */
class AppFixtures implements FixtureInterface
{
    /**
     * Method load test data
     *
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('Admin');
        $user1->setEmail('admin@test.com');
        $user1->setSuperAdmin(true);
        $user1->setEnabled(true);
        $user1->setPlainPassword(123);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('Kolya');
        $user2->setEmail('test1@test.com');
        $user2->setEnabled(true);
        $user2->setPlainPassword(123);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('Vasya');
        $user3->setEmail('test2@test.com');
        $user3->setEnabled(true);
        $user3->setPlainPassword(123);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUsername('Petya');
        $user4->setEmail('test3@test.com');
        $user4->setEnabled(true);
        $user4->setPlainPassword(123);
        $manager->persist($user4);

        $manager->flush();
    }
}