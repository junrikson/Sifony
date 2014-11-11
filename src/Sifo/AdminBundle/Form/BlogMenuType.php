<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogMenuType extends AbstractType
{
     /** 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text', array('max_length' => '50', 'label' => 'admin.label.code', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('name', 'text', array('max_length' => '50', 'label' => 'admin.label.name', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('orders', 'integer', array('max_length' => '11', 'label' => 'admin.label.orders', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('blog_category', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'admin.label.category', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\BlogCategory'))
            ->add('type', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'admin.label.type',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('1' => 'admin.choice.header', '2' => 'admin.choice.link')))
            ->add('blog_page', 'entity', array('required' => false, 'empty_value' => 'admin.choice.choosePage', 'attr' => array('class' => 'form-control m-bot15'), 'label' => 'admin.label.page', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\BlogPage'))
            ->add('parent', 'entity', array('required' => false, 'empty_value' => 'admin.choice.chooseParent', 'attr' => array('class' => 'form-control m-bot15'), 'label' => 'admin.label.parent', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\BlogMenu'))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'admin.label.description', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\BlogMenu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_blog_menu';
    }
}
