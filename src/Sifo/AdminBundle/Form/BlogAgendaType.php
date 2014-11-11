<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogAgendaType extends AbstractType
{
     /** 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tittle', 'text', array('max_length' => '250', 'label' => 'admin.label.tittle', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('blog_category', 'entity', array('class' => 'Sifo\SharedBundle\Entity\BlogCategory', 'multiple' => true, 'label' => 'admin.label.category', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('date_start', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'admin.label.dateStart', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('date_end', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'admin.label.dateEnd', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('time_start', 'time', array(
                'required' => false, 
                'label' => 'admin.label.timeStart', 
                'empty_value' => array('hour' => 'admin.choice.hour', 'minute' => 'admin.choice.minute'),
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('time_end', 'time', array(
                'required' => false, 
                'label' => 'admin.label.timeEnd',
                'empty_value' => array('hour' => 'admin.choice.hour', 'minute' => 'admin.choice.minute'),
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('place', 'textarea', array('max_length' => '250', 'label' => 'admin.label.place', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('content', 'textarea', array('required' => false, 'label' => 'admin.label.content', 'attr' => array('class' => 'form-control ckeditor'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\BlogAgenda'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_blog_agenda';
    }
}
