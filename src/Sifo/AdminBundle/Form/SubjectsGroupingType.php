<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubjectsGroupingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'entity', array('attr' => array('class' => 'form-control'), 'label' => 'Pelajaran *', 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Subject'))
            ->add('employee', 'entity', array('attr' => array('class' => 'form-control'), 'label' => 'Pengajar *', 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Employee'))
            ->add('category', 'choice', array(
                'attr' => array('class' => 'form-control'), 
                'label' => 'Kelompok',
                'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'),
                'choices'   => array('A' => 'A (Wajib)', 'B' => 'B (Wajib)', 'C' => 'C (Peminatan)', 'Ekstrakurikuler' => 'Ekstrakurikuler'),
                'empty_value' => '- Pilih Kelompok -',
                'required'  => false))
            ->add('day', 'choice', array(
                'attr' => array('class' => 'form-control'), 
                'label' => 'Hari',
                'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'),
                'choices'   => array('0' => 'Minggu', '1' => 'Senin', '2' => 'Selasa', '3' => 'Rabu', '4' => 'Kamis', '5' => 'Jumat', '6' => 'Sabtu'),
                'required'  => false, 
                'empty_value' => '- Pilih Hari Mengajar -'))
            ->add('start_time', 'time', array(
                'required' => false, 
                'label' => 'Jam Mulai', 
                'empty_value' => array('hour' => 'Jam', 'minute' => 'Menit'),
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('end_time', 'time', array(
                'required' => false, 
                'label' => 'Jam Berakhir', 
                'empty_value' => array('hour' => 'Jam', 'minute' => 'Menit'),
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\SubjectsGrouping'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_grouping_subjectsgrouping';
    }
}
