<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Books;
use AppBundle\Form\BooksForm;
/**
 * Blog controller.
 */
class BooksController extends Controller
{
    /**
     * Creates a new Blog entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Books();
        $form = $this->createForm(new BooksForm(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $em->flush();
        }
    }

//    /**
//     * Show a book entry
//     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $book = $em->getRepository('AppBundle:Books')->find($id);
//
//        return $this->render('AppBundle:Default:show.html.twig', array(
//            'book'      => $book,
//        ));
//    }
}