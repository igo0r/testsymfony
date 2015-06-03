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

namespace AppBundle\Admin;

use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Model\ModelManager;

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
class ReadersAdmin extends Admin
{
    protected $baseRouteName = 'readers';
    protected $baseRoutePattern = 'readers';

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add(
                'book',
                'entity',
                array(
                    'class'    => 'AppBundle:Books',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true
                )
            );
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('books');
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        /** @var $readersRepository \AppBundle\Entity\Repositories\ReadersRepository */
        $readersRepository = $this->getEntityManager()->getRepository('AppBundle:Readers');

        $readersBooksRelation = $readersRepository->getBooksByReaders();

        $listMapper
            ->add('name')
            ->add(
                'books',
                'string',
                array(
                    'template'   => 'AppBundle:CRUD:list_books.html.twig',
                    'extra_data' => array('readersBooks' => $readersBooksRelation)
                )
            )
            ->add(
                '_action',
                'input',
                array(
                    'actions' => array(
                        'show'   => array(),
                        'edit'   => array(),
                        'delete' => array(),
                    )
                )
            );
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        /** @var $modelManager ModelManager */
        $modelManager = $this->getModelManager();

        return $modelManager->getEntityManager($this->getClass());
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name');
    }

    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by'    => 'name'
    );
}
