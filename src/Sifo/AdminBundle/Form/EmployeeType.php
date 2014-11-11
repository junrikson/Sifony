<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployeeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text', array('max_length' => '50', 'attr' => array('class' => 'form-control'), 'label' => 'NA-SIM *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('name', 'text', array('max_length' => '50', 'attr' => array('class' => 'form-control'), 'label' => 'Nama Lengkap *', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('position', 'genemu_jqueryselect2_entity', array('class' => 'Sifo\SharedBundle\Entity\Position'))
            ->add('other_code', 'text', array('max_length' => '50', 'required' => false, 'attr' => array('class' => 'form-control'), 'label' => 'NIP', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
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
            ->add('marital', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'Status Perkawinan',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('BK' => 'Belum Menikah', 'K0' => 'Sudah Menikah - Belum Punya Anak', 'K1' => 'Sudah Menikah - Anak 1', 'K2' => 'Sudah Menikah - Anak 2', 'K3' => 'Sudah Menikah - Anak 3 atau lebih'),
                'required'  => false, 
                'empty_value' => '- Pilih Status Perkawinan -'))
            ->add('address', 'textarea', array('max_length' => '250', 'required' => false, 'label' => 'Alamat', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('phone', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nomor Telepon', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('mobile', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Nomor Handphone', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('weight', 'integer', array('max_length' => '11', 'required' => false, 'label' => 'Berat Badan (kg)', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('height', 'integer', array('max_length' => '11', 'required' => false, 'label' => 'Tinggi Badan (cm)', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('blood_type', 'choice', array(
                'attr' => array('class' => 'form-control m-bot15'), 
                'label' => 'Golongan Darah',
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'),
                'choices'   => array('O' => 'O', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'X' => 'Lainnya'),
                'required'  => false, 'empty_value' => '- Pilih Golongan Darah -'))
            ->add('education', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Pendidikan Terakhir', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'required'  => false))
            ->add('subject', 'text', array('max_length' => '50', 'required' => false, 'label' => 'Jurusan', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('date_employed', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'required' => false, 'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'Mulai Bertugas', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan Lainnya', 'required' => false, 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sifo\SharedBundle\Entity\Employee'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sifo_adminbundle_master_employee';
    }
}
