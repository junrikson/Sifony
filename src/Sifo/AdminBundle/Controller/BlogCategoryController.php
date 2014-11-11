<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\BlogCategory;
use Sifo\AdminBundle\Form\BlogCategoryType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * BlogCategory controller.
 *
 */
class BlogCategoryController extends Controller
{
    /**
     * Lists all BlogCategory entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogCategory');
        $queryProcesses = $repository->getProcessesNativeQuery();

        $paginator = new Paginator();
        $pagination = $paginator->paginate($queryProcesses,
            $this->get('request')->query->get('page', 1),20);

        $form = $this->createFilterForm();

        return $this->render('SifoAdminBundle:index:blog_category.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    public function filterAction(Request $request)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogCategory');
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

        return $this->render('SifoAdminBundle:index:blog_category.html.twig', array(
            'entities'  => $pagination,
            'paginator' => $paginator, 
            'user'      => $user,
            'form'      => $form->createView(),
        ));
    }

    private function createFilterForm()
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_blog_category_filter'))
            ->setMethod('GET')
            ->add('name', 'text', array('max_length' => '50', 'label' => 'admin.label.name', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            //->add('date_started', 'date', array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => array('class' => 'form-control col-lg-2 form-control-inline input-medium default-date-picker', 'size' => '16'), 'label' => 'Tanggal Dimulai', 'required' => false, 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'admin.label.description', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            // ->add('is_active', 'checkbox', array('required' => false, 'label' => 'Aktif', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('isActive', 'choice', array(
                'attr' => array('class' => 'form-control col-lg-2'), 
                'label' => 'admin.label.isActive',
                'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label'),
                'choices'  => array('true' => 'Aktif', 'false' => 'Tidak Aktif'),
                // 'multiple'  => true,
                // 'expanded'  => true, 
                'required'  => false, 
                'empty_value' => '- All -'))
            ->add('submit', 'submit', array('label' => 'admin.button.search', 'attr' => array('class' => 'btn btn-info')))
            ->getForm()
        ;
    }

    /**
     * Creates a new BlogCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $entity = new BlogCategory();
        $entity->setOperator($user->getName());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blog_category_new', array('id' => $entity->getId())));
        }

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to create a BlogCategory entity.
    *
    * @param BlogCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogCategory $entity)
    {
        $form = $this->createForm(new BlogCategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_blog_category_create'),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'admin.label.isActive', 'attr' => array('checked' => 'checked'), 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('label' => 'admin.button.save', 'attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new BlogCategory entity.
     *
     */
    public function newAction()
    {
        $user = $this->getUser();
        $entity = new BlogCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('SifoAdminBundle:new:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
     * Finds and displays a BlogCategory entity.
     *
     */
    public function showAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        return $this->render('SifoAdminBundle:show:blog_category.html.twig', array(
            'entity'      => $entity,
            'user'        => $user,
        ));
    }

    /**
     * Displays a form to edit an existing BlogCategory entity.
     *
     */
    public function editAction($id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        $form = $this->createEditForm($entity);

        return $this->render('SifoAdminBundle:edit:layout.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'user'   => $user,
        ));
    }

    /**
    * Creates a form to edit a BlogCategory entity.
    *
    * @param BlogCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogCategory $entity)
    {
        $form = $this->createForm(new BlogCategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_blog_category_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('is_active', 'checkbox', array('required' => false, 'label' => 'admin.label.isActive', 'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
             ->add('save', 'submit', array('label' => 'admin.button.save', 'attr' => array('class' => 'btn btn-info')))
        ;

        return $form;
    }
    /**
     * Edits an existing BlogCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SifoSharedBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        $entity->setOperator($user->getName());
        $form = $this->createEditForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blog_category_show', array('id' => $id)));
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
        $entity = $em->getRepository('SifoSharedBundle:BlogCategory')->find($id);
        $form = $this->createDeleteForm($id);        

        return $this->render('SifoAdminBundle:remove:layout.html.twig', array(
            'entity'      => $entity,
            'form'        => $form->createView(),
            'user'        => $user,
        ));
    }

    /**
     * Deletes a BlogCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SifoSharedBundle:BlogCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_blog_category'));
    }

    /**
     * Creates a form to delete a BlogCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_blog_category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'admin.button.delete', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
