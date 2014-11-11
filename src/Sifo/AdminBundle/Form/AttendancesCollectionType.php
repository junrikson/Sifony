<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AttendancesCollectionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('attendances', 'collection', array(
                'label' => false, 
                'options'  => array('label' => false, 'required'  => false),
                'type' => new AttendanceType()))
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
        return 'sifo_adminbundle_studentsgrouping';
    }
}
