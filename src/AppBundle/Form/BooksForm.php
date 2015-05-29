<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BooksForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('author');
    }

    public function getName()
    {
        return 'books';
    }
}