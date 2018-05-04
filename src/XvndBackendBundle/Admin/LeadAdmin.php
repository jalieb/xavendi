<?php

namespace XvndBackendBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LeadAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('uniqueUserHash')
            ->add('data')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('uniqueUserHash')
            ->add('data')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('uniqueUserHash')
            ->add('data')
            ->add('campaigns', 'sonata_type_model', array(
                'multiple' => true,
                'required' => false,
                'btn_add' => false
            ))
            ->add('placement')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('uniqueUserHash')
            ->add('data')
        ;
    }
}
