<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('max_length' => '50', 'label' => 'Nama *', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('unit', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Unit *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Unit'))
            ->add('period', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Periode *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Period'))
            ->add('semester', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'Semester *',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('0' => 'Ganjil', '1' => 'Genap'),
                'empty_value' => false))
            ->add('classroom', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Kelas *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Classroom'))
            ->add('employee', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Wali Kelas *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Employee'))
            ->add('password1', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'Password 1', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('password2', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'Password 2', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\Grouping'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_grouping_grouping';
    }
}
