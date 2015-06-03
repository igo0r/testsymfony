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
                'readersRelations',
                'entity',
                array('class' => 'AppBundle:Books', 'expanded' => true, 'multiple' => true, 'by_reference' => false)
            );
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add(
                'readersRelations',
                'entity', array('class' => 'AppBundle:Books', 'expanded' => true, 'multiple' => true, 'by_reference' => false)
            );
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add(
                'readersRelations',
                'entity', array('class' => 'AppBundle:Books')
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

    public function preUpdate($object)
    {
        //TODO: add check for existing fields

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
