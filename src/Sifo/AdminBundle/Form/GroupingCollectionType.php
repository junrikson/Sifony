<?php

namespace Sifo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class GroupingCollectionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $grouping = $event->getData();
                $form = $event->getForm();

                // check if the Product object is "new"
                // If no data is passed to the form, the data is "null".
                // This should be considered a new "Product"
                if (!$grouping || null === $grouping->getId()) {
                    $form->add('name', 'text', array('max_length' => '50', 'label' => 'Nama', 'attr' => array('class' => 'form-control'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')));
                }})
            ->add('studentsGroupings', 'collection', array('type' => new StudentsGroupingType(), 'label' => false))
            ->add('subjectsGroupings', 'collection', array('type' => new SubjectsGroupingType(), 'label' => false))
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
        return 'sifo_adminbundle_grouping';
    }
}
