<?php

namespace XvndBackendBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Show\ShowMapper;

class CampaignAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('campaignType')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('advertiser')
            ->add('campaignType')
            ->add('shortDesc')
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Kampagnendetails')
                ->with('Allgemein', array(
                    'class' => 'col-md-6'
                ))
                    ->add('name')
                    ->add('advertiser', 'sonata_type_model', array(
                        'btn_add' => true,
                        'required' => false,
                        'by_reference' => true
                    ))
                    ->add('placements', 'sonata_type_model', array(
                        'by_reference' => false,
                        'multiple' => true,
                        'required' => false,
                        'btn_add' => false
                    ))
                    ->add('campaignType', null, array(
                        'required' => true
                    ))
                ->end()
                ->with('Content', array(
                    'class' => 'col-md-6'
                ))
                    ->add('smallDesc')
                    ->add('longDesc', 'textarea', array(
                        'attr' => array(
                            'rows' => '10'
                        )
                    ))
                ->end()
            ->end()
            ->tab('Formular')
                ->add('fields', 'sonata_type_collection', array(
                    'by_reference' => false
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table'
                ))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('advertiser')
            ->add('type')
            ->add('campaignType')
        ;
    }
}
