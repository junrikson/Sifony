<?php

namespace Sifo\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\Student;
/**
 * MstGrup controller.
 *
 */
class ProfileController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();

        return $this->render('SifoUserBundle:Profile:index.html.twig', array(
            'user'      => $user,
            'programs'  => $programs,
        ));
    }

    public function editAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $form = $this->createEditForm($entity);

        return $this->render('SifoUserBundle:Profile:edit.html.twig', array(
            'user'      => $user,
            'form'      => $form->createView(),
            'programs'  => $programs,
        ));
    }

    private function createEditForm(Student $entity)
    {
        return $form = $this->createFormBuilder($entity)
            ->setAction($this->generateUrl('user_profile_update'))
            ->setMethod('POST')
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
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ->getForm();
    }

    public function updateAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createEditForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_profile'));
        }

        return $this->render('SifoUserBundle:Profile:edit.html.twig', array(
            'programs'  => $programs,
            'form'      => $form->createView(),
            'user'      => $user,
        ));
    }

    public function settingsAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $form = $this->createPasswordForm($entity);
        $formFacebook = $this->createFacebookForm();
        $formTwitter = $this->createTwitterForm();

        return $this->render('SifoUserBundle:Profile:settings.html.twig', array(
            'user'          => $user,
            'programs'      => $programs,
            'form'          => $form->createView(),
            'form_facebook' => $formFacebook->createView(),
            'form_twitter'  => $formTwitter->createView(),
        ));
    }

    private function createPasswordForm(Student $entity)
    {
        return $form = $this->createFormBuilder($entity)
            ->setAction($this->generateUrl('user_profile_password'))
            ->setMethod('POST')
            ->add('password', 'repeated', array(
                'max_length' => '255', 
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'required' => false, 
                'first_options'  => array('label' => 'Password Baru', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'Ulangi Password', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'attr' => array('class' => 'form-control'))))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ->getForm();
    }

    private function createFacebookForm()
    {
        return $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('user_profile_facebook_reset'))
            ->setMethod('POST')
            ->add('Reset', 'submit', array('attr' => array('class' => 'btn btn-danger')))
        ->getForm();
    }

    private function createTwitterForm()
    {
        return $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('user_profile_twitter_reset'))
            ->setMethod('POST')
            ->add('Reset', 'submit', array('attr' => array('class' => 'btn btn-danger')))
        ->getForm();
    }

    public function passwordAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createPasswordForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_profile_settings'));
        }

        $formFacebook = $this->createFacebookForm();
        $formTwitter = $this->createTwitterForm();

        return $this->render('SifoUserBundle:Profile:settings.html.twig', array(
            'user'          => $user,
            'programs'      => $programs,
            'form'          => $form->createView(),
            'form_facebook' => $formFacebook->createView(),
            'form_twitter'  => $formTwitter->createView(),
        ));
    }

    public function facebookAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName())
               ->setFacebookId(null)
               ->setFacebookAccessToken(null);
        $em->flush();

        $form = $this->createPasswordForm($entity);
        $formFacebook = $this->createFacebookForm();
        $formTwitter = $this->createTwitterForm();

        return $this->render('SifoUserBundle:Profile:settings.html.twig', array(
            'user'          => $user,
            'programs'      => $programs,
            'form'          => $form->createView(),
            'form_facebook' => $formFacebook->createView(),
            'form_twitter'  => $formTwitter->createView(),
        ));
    }

    public function twitterAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($user->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName())
               ->setTwitterId(null)
               ->setTwitterAccessToken(null);
        $em->flush();

        $form = $this->createPasswordForm($entity);
        $formFacebook = $this->createFacebookForm();
        $formTwitter = $this->createTwitterForm();

        return $this->render('SifoUserBundle:Profile:settings.html.twig', array(
            'user'          => $user,
            'programs'      => $programs,
            'form'          => $form->createView(),
            'form_facebook' => $formFacebook->createView(),
            'form_twitter'  => $formTwitter->createView(),
        ));
    }
}
