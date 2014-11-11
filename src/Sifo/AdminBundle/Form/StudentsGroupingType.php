<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentsGroupingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student', 'entity', array('attr' => array('class' => 'form-control col-lg-2'), 'label' => 'Pelajar *', 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Student'))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\StudentsGrouping'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_grouping_studentsgrouping';
    }
}
