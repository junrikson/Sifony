<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\SubjectsGrouping;
use Sifo\AdminBundle\Form\SubjectsGroupingType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * SubjectsGrouping controller.
 *
 */
class SubjectsGroupingController extends Controller
{

    /**
     * Lists all SubjectsGrouping entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Grouping');
        $queryProcesses = $repository->getProcessesNativeQuery();

        $paginator = new Paginator();
        $pagination = $paginator->paginate($queryProcesses,
            $this->get('request')->query->get('page', 1),20);

        $form = $this->createFilterForm();

        return $this->render('SifoAdminBundle:index:grouping_list.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    public function filterAction(Request $request)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Grouping');
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

        return $this->render('SifoAdminBundle:index:grouping_list.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    private function createFilterForm()
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_grouping_subjects-grouping_filter'))
            ->setMethod('GET')
            ->add('name', 'text', array('max_length' => '50', 'label' => 'Nama', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('submit', 'submit', array('label' => 'Search', 'attr' => array('class' => 'btn btn-info')))
            ->getForm()
        ;
    }

    /**
     * Manage a SubjectsGrouping entity.
     *
     */
    public function manageAction(Request $request, $id)
    {
        /* Grup Information */
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Grouping')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grouping entity.');
        }  

        /* Grup Mapel List */
        $entities = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->findByGrouping($entity);

        /* Add / New Form */
        $subjects = new SubjectsGrouping();
        $subjects->setGrouping($entity);
        $form = $this->createCreateForm($subjects, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subjects);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_grouping_subjects-grouping_manage', array('id' => $id)));
        }

        return $this->render('SifoAdminBundle:manage:subjects_grouping.html.twig', array(
            'entities' => $entities, 
            'entity'   => $entity, 
            'form'     => $form->createView(),
            'user'     => $user,
        ));
    }

    /**
    * Creates a form to create a Position entity.
    *
    * @param Position $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SubjectsGrouping $entity, $id)
    {
        $form = $this->createForm(new SubjectsGroupingType(), $entity, array(
            'action' => $this->generateUrl('admin_grouping_subjects-grouping_manage', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'attr' => array('checked' => 'checked'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }

    /**
     * Finds and displays a Program entity.
     *
     */
    public function showAction($index, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subjects Grouping entity.');
        }

        return $this->render('SifoAdminBundle:show:subjects_grouping.html.twig', array(
            'entity'      => $entity,
            'user'        => $user,
        ));
    }

    /**
     * Displays a form to edit an existing SubjectsGrouping entity.
     *
     */
    public function editAction($index, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubjectsGrouping entity.');
        }

        $form = $this->createEditForm($entity, $index);

        return $this->render('SifoAdminBundle:edit:subjects_grouping.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to edit a SubjectsGrouping entity.
    *
    * @param SubjectsGrouping $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SubjectsGrouping $entity, $index)
    {
        $form = $this->createForm(new SubjectsGroupingType(), $entity, array(
            'action' => $this->generateUrl('admin_grouping_subjects-grouping_update', array('id' => $entity->getId(), 'index' => $index)),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }

    /**
     * Edits an existing SubjectsGrouping entity.
     *
     */
    public function updateAction(Request $request, $id, $index)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubjectsGrouping entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createEditForm($entity, $index);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_grouping_subjects-grouping_show', array('id' => $id, 'index' => $index)));
        }

        return $this->render('SifoAdminBundle:edit:subjects_grouping.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
     * Create remove form.
     *
     */
    public function removeAction($index, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($id);
        $form = $this->createDeleteForm($index, $id);        

        return $this->render('SifoAdminBundle:remove:subjects_grouping.html.twig', array(
            'entity'      => $entity,
            'form'        => $form->createView(),
            'user'        => $user,
        ));
    }

    /**
     * Deletes a SubjectsGrouping entity.
     *
     */
    public function deleteAction(Request $request, $index, $id)
    {
        $form = $this->createDeleteForm($index, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SubjectsGrouping entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_grouping_subjects-grouping_manage', array('id' => $index)));
    }

    /**
     * Creates a form to delete a SubjectsGrouping entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($index, $id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_grouping_subjects-grouping_delete', array('index' => $index, 'id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
