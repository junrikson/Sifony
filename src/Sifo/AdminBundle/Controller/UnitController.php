<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\Unit;
use Sifo\AdminBundle\Form\UnitType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * Unit controller.
 *
 */
class UnitController extends Controller
{

    /**
     * Lists all Unit entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Unit');
        $queryProcesses = $repository->getProcessesNativeQuery();

        $paginator = new Paginator();
        $pagination = $paginator->paginate($queryProcesses,
            $this->get('request')->query->get('page', 1),20);

        $form = $this->createFilterForm();

        return $this->render('SifoAdminBundle:index:unit.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    public function filterAction(Request $request)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:Unit');
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

        return $this->render('SifoAdminBundle:index:unit.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    private function createFilterForm()
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_master_unit_filter'))
            ->setMethod('GET')
            ->add('name', 'text', array('max_length' => '50', 'label' => 'Nama', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('address', 'text', array('max_length' => '50', 'label' => 'Alamat', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
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
     * Creates a new Unit entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $entity = new Unit();
        $entity->setOperator($user->getName());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_master_unit_new', array('id' => $entity->getId())));
        }

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to create a Unit entity.
    *
    * @param Unit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Unit $entity)
    {
        $form = $this->createForm(new UnitType(), $entity, array(
            'action' => $this->generateUrl('admin_master_unit_create'),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'attr' => array('checked' => 'checked'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))     
        ;

        return $form;
    }

    /**
     * Displays a form to create a new Unit entity.
     *
     */
    public function newAction()
    {
        $user = $this->getUser();
        $entity = new Unit();
        $form   = $this->createCreateForm($entity);

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
     * Finds and displays a Unit entity.
     *
     */
    public function showAction($id)
    {
        $user = $this->getUser();	
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Unit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unit entity.');
        }

        return $this->render('SifoAdminBundle:show:unit.html.twig', array(
            'entity' => $entity,
            'user'   => $user,
        ));
    }

    /**
     * Displays a form to edit an existing Unit entity.
     *
     */
    public function editAction($id)
    {
        $user = $this->getUser();	
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Unit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unit entity.');
        }

        $form = $this->createEditForm($entity);

        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to edit a Unit entity.
    *
    * @param Unit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Unit $entity)
    {
        $form = $this->createForm(new UnitType(), $entity, array(
            'action' => $this->generateUrl('admin_master_unit_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')))    
        ;

        return $form;
    }
    /**
     * Edits an existing Unit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:Unit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unit entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createEditForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_master_unit_show', array('id' => $id)));
        }

        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
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
        $entity = $em->getRepository('SifoSharedBundle:Unit')->find($id);
        $form = $this->createDeleteForm($id);        

        return $this->render('SifoAdminBundle:remove:layout.html.twig', array(
            'entity'      => $entity,
            'form'        => $form->createView(),
            'user'        => $user,
        ));
    }

    /**
     * Deletes a Unit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SifoSharedBundle:Unit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Unit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_master_unit'));
    }

    /**
     * Creates a form to delete a Unit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_master_unit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
