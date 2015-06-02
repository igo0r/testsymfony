<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Readers;
use AppBundle\Form\ReadersForm;
/**
 * Blog controller.
 */
class ReadersController extends Controller
{
    /**
     * Creates a new Blog entity.
     *
     */
//    public function createAction(Request $request)
//    {
//        $entity = new Readers();
//        $form = $this->createForm(new ReadersForm(), $entity);
//        $form->bind($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//
//            $em->persist($entity);
//            $em->flush();
//        }
//    }

//    /**
//     * Show a book entry
//     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $book = $em->getRepository('AppBundle:Readers')->find($id);
//
//        return $this->render('AppBundle:Default:show.html.twig', array(
//            'book'      => $book,
//        ));
//    }
}