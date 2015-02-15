<?php
/**
 * Default Controller  file
 *
 * PHP version 5.3
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage Controller
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\DataTransformer\RoleDataTransformer;

/**
 * Default Controller Class
 *
 * @category   testsymfony
 * @package    AppBundle
 * @subpackage Controller
 * @author     Rykun Vladyslav <vladislavrykun@gmail.com>
 * @copyright  2011-2015 (http://test.com). All rights reserved.
 * @license    http://test.com Commercial
 * @link       http://test.com
 */
class DefaultController extends Controller
{
    /**
     * Memberlist show action
     *
     * @return Response
     */
    public function showAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->getList();

        return $this->render('AppBundle:Memberslist:showlist.html.twig', array('users' => json_encode($users)));
    }

    /**
     * Add new user action
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getEntityManager();
        $transformer = new RoleDataTransformer($em);
        $builder = $this->createFormBuilder($user);

        $form = $this->createFormBuilder($user)
            ->add('username', 'text',array('label' => 'Username:'))
            ->add('email', 'text', array('label' => 'E-mail:'))
            ->add($builder->create('roles', 'choice', array(
                'choices' => array(
                    1 => 'ROLE_USER',
                    2 => 'ROLE_SUPER_ADMIN'
                )
            ))->addModelTransformer($transformer))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $user->setPlainPassword(123);
                $user->setEnabled(true);
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('users_show', array('memberlist' => $em->getRepository('AppBundle:User')->findAll()) ));
            }
        }

        return $this->render('AppBundle:Memberslist:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Edit user action
     *
     * @return Response
     */
    public function editAction($id, Request $request)
    {
        if (!$id) {
            throw $this->createNotFoundException('Id is empty = '.$id);
        }

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user){
            throw $this->createNotFoundException('User not found by id = '.$id);
        }

        $transformer = new RoleDataTransformer($em);

        $builder = $this->createFormBuilder($user);

        $form = $builder
            ->add('username', 'text',array('label' => 'Username:'))
            ->add('email', 'text', array('label' => 'E-mail:'))
            ->add($builder->create('roles', 'choice', array(
                'choices' => array(
                    1 => 'ROLE_USER',
                    2 => 'ROLE_SUPER_ADMIN'
                )
            ))->addModelTransformer($transformer))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $em->flush();

            return $this->redirect($this->generateUrl('users_show', array('memberlist' => $em->getRepository('AppBundle:User')->findAll()) ));
        }

        return $this->render('AppBundle:Memberslist:edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $user->getId(),
        ));
    }

    /**
     * Delete user action
     *
     * @return Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Member no found by id '.$id);
        }

        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl('users_show', array('memberlist' => $em->getRepository('AppBundle:User')->findAll()) ));
    }
}
