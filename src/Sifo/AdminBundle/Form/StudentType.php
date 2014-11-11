<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text', array('max_length' => '50', 'attr' => array('class' => 'form-control'), 'label' => 'NIS-SIM *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('name', 'text', array('max_length' => '50', 'attr' => array('class' => 'form-control'), 'label' => 'Nama Lengkap *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('unit', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Unit *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Unit'))
            ->add('period', 'entity', array('attr' => array('class' => 'form-control m-bot15'), 'label' => 'Periode Masuk *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'class' => 'Sifo\SharedBundle\Entity\Period'))
            ->add('date_entered', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'Tanggal Masuk', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('other_code', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'NISDN', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('email', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'Email', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('gender', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'Jenis Kelamin',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('M' => 'Laki-laki', 'F' => 'Perempuan'),
                'required'  => false, 
                'empty_value' => '- Pilih Jenis Kelamin -'))
            ->add('birth_place', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'Tempat Lahir', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('birth_date', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'Tanggal Lahir', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('religion', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Agama', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('address', 'textarea', array('max_length' => '250', 'required' => false, 'label' => 'Alamat', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('phone', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nomor Telepon', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('mobile', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nomor Handphone', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('blood_type', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'Golongan Darah',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('O' => 'O', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'X' => 'Lainnya'),
                'required'  => false, 
                'empty_value' => '- Pilih Golongan Darah -'))
            ->add('father_name', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nama Ayah', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'required'  => false))
            ->add('father_job', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Pekerjaan Ayah', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('father_phone', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Telepon Ayah', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('mother_name', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nama Ibu', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'required'  => false))
            ->add('mother_job', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Pekerjaan Ibu', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('mother_phone', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Telepon Ibu', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('custodian_name', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nama Wali', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'required'  => false))
            ->add('custodian_job', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Pekerjaan Wali', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('custodian_phone', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Telepon Wali', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan Lainnya', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_master_student';
    }
}
