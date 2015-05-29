<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ReadersForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');
    }

    public function getName()
    {
        return 'readers';
    }
}