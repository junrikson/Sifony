<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogPageType extends AbstractType
{
     /** 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text', array('max_length' => '50', 'label' => 'admin.label.code', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('tittle', 'text', array('max_length' => '250', 'label' => 'admin.label.tittle', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('content', 'textarea', array('required' => false, 'label' => 'admin.label.content', 'attr' => array('class' => 'form-control ckeditor'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\BlogPage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_blog_page';
    }
}
