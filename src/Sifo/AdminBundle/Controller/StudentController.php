<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\Student;
use Sifo\AdminBundle\Form\StudentType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * Student controller.
 *
 */
class StudentController extends Controller
{

    /**
     * Lists all Student entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Student');
        $queryProcesses = $repository->getProcessesNativeQuery();

        $paginator = new Paginator();
        $pagination = $paginator->paginate($queryProcesses,
            $this->get('request')->query->get('page', 1),20);

        $form = $this->createFilterForm();

        return $this->render('SifoAdminBundle:index:student.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }


    public function filterAction(Request $request)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Student');
        $paginator = new Paginator();
        $pagination = NULL;

        $form = $this->createFilterForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $criteria = $form->getData();
            $queryProcesses = $repository->getFilterSearch($criteria);
            $pagination = $paginator->paginate($queryProcesses,
                $this->get('request')->query->get('page', 1),20);
        }

        return $this->render('SifoAdminBundle:index:student.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    private function createFilterForm()
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_master_student_filter'))
            ->setMethod('GET')
            ->add('code', 'text', array('max_length' => '50', 'label' => 'NIS', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('name', 'text', array('max_length' => '50', 'label' => 'Nama', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('isActive', 'choice', array(
                'attr' => array('class' => 'form-control col-lg-2'), 
                'label' => 'Status',
                'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'),
                'choices'  => array('true' => 'Aktif', 'false' => 'Tidak Aktif'),
                // 'multiple'  => true,
                // 'expanded'  => true, 
                'required'  => false, 
                'empty_value' => '- All -'))
            ->add('submit', 'submit', array('label' => 'Search', 'attr' => array('class' => 'btn btn-info')))
            ->getForm()
        ;
    }

    /**
     * Creates a new Student entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $entity = new Student();
        $entity->setOperator($user->getName());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_master_student_new', array('id' => $entity->getId())));
        }

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to create a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Student $entity)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('admin_master_student_create'),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'attr' => array('checked' => 'checked'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('password', 'repeated', array(
                'max_length' => '255', 
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'required' => false, 
                'first_options'  => array('label' => 'Password', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'Ulangi Password', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 'attr' => array('class' => 'form-control'))))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new Student entity.
     *
     */
    public function newAction()
    {
        $user = $this->getUser();
        $entity = new Student();
        $form   = $this->createCreateForm($entity);

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
     * Finds and displays a Student entity.
     *
     */
    public function showAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        return $this->render('SifoAdminBundle:show:student.html.twig', array(
            'entity'      => $entity,
            'user'        => $user,
        ));
    }

    /**
     * Displays a form to edit an existing Student entity.
     *
     */
    public function editAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $form = $this->createEditForm($entity);
        $formPassword = $this->createPasswordForm($entity);

        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity'        => $entity,
            'form'          => $form->createView(),
            'form_password' => $formPassword->createView(),
            'user'          => $user,
        ));
    }

    /**
    * Creates a form to edit a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Student $entity)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('admin_master_student_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }

    private function createPasswordForm(Student $entity)
    {
        return $form = $this->createFormBuilder($entity)
            ->setAction($this->generateUrl('admin_master_student_update_password', array('id' => $entity->getId())))
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

    /**
     * Edits an existing Student entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createEditForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_master_student_show', array('id' => $id)));
        }

        $formPassword = $this->createPasswordForm($entity);
        
        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity'        => $entity,
            'form'          => $form->createView(),
            'form_password' => $formPassword->createView(),
            'user'          => $user,
        ));
    }

    public function passwordAction(Request $request, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $entity->setOperator($user->getName());
        $formPassword = $this->createPasswordForm($entity);
        $formPassword->handleRequest($request);

        if ($formPassword->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_master_student_show', array('id' => $id)));
        }

        $form = $this->createEditForm($entity);

        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity'        => $entity,
            'form'          => $form->createView(),
            'form_password' => $formPassword->createView(),
            'user'          => $user,
        ));
    }

    /**
     * Create remove form.
     *
     */
    public function removeAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);
        $form = $this->createDeleteForm($id);        

        return $this->render('SifoAdminBundle:remove:layout.html.twig', array(
            'entity'      => $entity,
            'form'        => $form->createView(),
            'user'        => $user,
        ));
    }

    /**
     * Deletes a Student entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SifoSharedBundle:Student')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Student entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_master_student'));
    }

    /**
     * Creates a form to delete a Student entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_master_student_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
