<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResultType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number_1', 'number', array('max_length' => '10', 'required' => false, 'label' => false, 'attr' => array('style' => 'width: 50px;')))
            ->add('number_2', 'number', array('max_length' => '10', 'required' => false, 'label' => false, 'attr' => array('style' => 'width: 50px;')))
            ->add('number_3', 'number', array('max_length' => '10', 'required' => false, 'label' => false, 'attr' => array('style' => 'width: 50px;')))
            ->add('text_1', 'text', array('max_length' => '250', 'required' => false, 'label' => false, 'attr' => array('style' => 'width: 100px;')))
            ->add('text_2', 'text', array('max_length' => '250', 'required' => false, 'label' => false, 'attr' => array('style' => 'width: 100px;')))
            ->add('description', 'text', array('max_length' => '250', 'required' => false, 'label' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\Result'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_result_result';
    }
}
