<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;

use Sifo\SharedBundle\Entity\Result;
use Sifo\SharedBundle\Entity\StudentsGrouping;
use Sifo\AdminBundle\Form\ResultsCollectionType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * Result controller.
 *
 */
class ResultController extends Controller
{

    /**
     * Lists all Result entities.
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
            ->setAction($this->generateUrl('admin_result_result_filter'))
            ->setMethod('GET')
            ->add('name', 'text', array('max_length' => '50', 'label' => 'Nama', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('description', 'textarea', array('max_length' => '250', 'label' => 'Keterangan', 'required' => false, 'attr' => array('class' => 'form-control col-lg-2'), 'label_attr' => array('class' => 'col-lg-2 col-sm-2 control-label')))
            ->add('submit', 'submit', array('label' => 'Search', 'attr' => array('class' => 'btn btn-info')))
            ->getForm()
        ;
    }

    public function manageAction(Request $request, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SifoSharedBundle:StudentsGrouping')->findByGrouping($id);
        $formCollection = NULL;

        /* Refresh, Delete Form and Action */
        $data = array();
        $form = $this->createRefreshForm($data, $id);

        if (('POST' === $request->getMethod()) or ('GET' === $request->getMethod())) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                if ($form->get('refresh')->isClicked())
                {
                    $program = $em->getRepository('SifoSharedBundle:Program')->find($form->get('program')->getData());
                    $subjectsGrouping = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($form->get('subjects_grouping')->getData());
                    foreach ($entities as $temp) {
                        $entity = new Result();
                        $entity = $em->getRepository('SifoSharedBundle:Result')->findOneBy(array('studentsGrouping' => $temp, 'subjectsGrouping' => $subjectsGrouping, 'program' => $program));
                        if (!$entity){
                            $entity = new Result();
                            $entity->setStudentsGrouping($temp)
                                ->setSubjectsGrouping($subjectsGrouping)
                                ->setProgram($program)
                                ->setOperator($user->getName());
                            $em->persist($entity); 
                        }           
                    }
                    $em->flush();

                    /* Collection Form */
                    $results = new StudentsGrouping();
                    foreach ($entities as $temp) {
                        $entity = new Result();
                        $entity = $em->getRepository('SifoSharedBundle:Result')->findOneBy(array('studentsGrouping' => $temp, 'subjectsGrouping' => $subjectsGrouping, 'program' => $program));
                        if ($entity)
                        {
                            $results->getResults()->add($entity);
                        }
                    }

                    $formCollection = $this->createCollectionForm($results, $id, $program, $subjectsGrouping);
                    $formCollection = $formCollection->createView();
                }
                elseif ($form->get('delete')->isClicked())
                {
                    $program = $em->getRepository('SifoSharedBundle:Program')->find($form->get('program')->getData());
                    $subjectsGrouping = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($form->get('subjects_grouping')->getData());
                    foreach ($entities as $temp) {
                        $entity = new Result();
                        $entity = $em->getRepository('SifoSharedBundle:Result')->findOneBy(array('studentsGrouping' => $temp, 'subjectsGrouping' => $subjectsGrouping, 'program' => $program));
                        if ($entity){
                            $em->remove($entity); 
                        }           
                    }
                    $em->flush();
                }
            } 
            else{
                /* Collection Form */
                $program = $request->request->get('sifo_adminbundle_studentsgrouping')['program'];
                if(!is_null($program)){
                    $program = $em->getRepository('SifoSharedBundle:Program')->find($program);
                    $subjectsGrouping = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($request->request->get('sifo_adminbundle_studentsgrouping')['subjects_grouping']);
                    $results = new StudentsGrouping();
                    foreach ($entities as $temp) {
                        $entity = new Result();
                        $entity = $em->getRepository('SifoSharedBundle:Result')->findOneBy(array('studentsGrouping' => $temp, 'subjectsGrouping' => $subjectsGrouping, 'program' => $program));
                        if ($entity)
                        {
                            $results->getResults()->add($entity);
                        }
                    }

                    $formCollection = $this->createCollectionForm($results, $id, $program, $subjectsGrouping);
                    $formCollection = $formCollection->createView();
                }
            }
        }
        elseif ('PUT' === $request->getMethod()){
            $program = $em->getRepository('SifoSharedBundle:Program')->find($request->request->get('sifo_adminbundle_studentsgrouping')['program']);
            $subjectsGrouping = $em->getRepository('SifoSharedBundle:SubjectsGrouping')->find($request->request->get('sifo_adminbundle_studentsgrouping')['subjects_grouping']);
            $results = new StudentsGrouping();
            foreach ($entities as $temp) {
                $entity = new Result();
                $entity = $em->getRepository('SifoSharedBundle:Result')->findOneBy(array('studentsGrouping' => $temp, 'subjectsGrouping' => $subjectsGrouping, 'program' => $program));
                if($entity){
                    $results->getResults()->add($entity);
                }
            }
            $formCollection = $this->createCollectionForm($results, $id, $program, $subjectsGrouping);
            $formCollection->handleRequest($request);

            if ($formCollection->isValid()){
                $em->flush();
                $formCollection = $formCollection->createView();
                $form->get('program')->setData($program);
                $form->get('subjects_grouping')->setData($subjectsGrouping);
            }
        }

        return $this->render('SifoAdminBundle:manage:result.html.twig', array(
            'form'            => $form->createView(),
            'form_collection' => $formCollection,
            'entities'        => $entities,
            'user'            => $user,
        ));
    }

    /**
    * Creates a form to create a Grouping entity.
    *
    * @param Grouping $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createRefreshForm($data, $id)
    {
        return $form = $this->createFormBuilder($data)
            ->setAction($this->generateUrl('admin_result_result_manage', array('id' => $id)))
            ->setMethod('POST')
            ->add('program', 'entity', array(
                'attr' => array('class' => 'form-control'), 
                'label' => 'Program', 
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 
                'class' => 'Sifo\SharedBundle\Entity\Program'))
            ->add('subjects_grouping', 'entity', array(
                'attr' => array('class' => 'form-control'), 
                'label' => 'Pelajaran', 
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label'), 
                'class' => 'Sifo\SharedBundle\Entity\SubjectsGrouping',
                'query_builder' => function(EntityRepository $er) use ($id) {
                    return $er->createQueryBuilder('u')
                        ->where('u.grouping = ?1')
                        ->setParameter(1, $id);}))
            ->add('refresh', 'submit', array('attr' => array('class' => 'btn btn-info', 'style' => 'float: left')))
            ->add('delete', 'submit', array('attr' => array('class' => 'btn btn-danger', 'style' => 'clear: both; margin-left : 5px')))
        ->getForm();
    }

    /**
    * Creates Collection form
    */
    private function createCollectionForm(StudentsGrouping $results, $id, $program, $subjectsGrouping)
    {
        $form = $this->createForm(new ResultsCollectionType(), $results, array(
            'action' => $this->generateUrl('admin_result_result_manage', array('id' => $id)),
            'method' => 'PUT',
        ));

        $form->add('program', 'entity', array(
                 'data' => $program,
                 'mapped' => false,
                 'attr' => array('class' => 'form-control', 'style' => 'display: none;'), 
                 'label' => false, 
                 'class' => 'Sifo\SharedBundle\Entity\Program'))
             ->add('subjects_grouping', 'entity', array(
                 'data' => $subjectsGrouping,
                 'mapped' => false,
                 'attr' => array('class' => 'form-control', 'style' => 'display: none;'), 
                 'label' => false, 
                 'class' => 'Sifo\SharedBundle\Entity\SubjectsGrouping',
                 'query_builder' => function(EntityRepository $er) use ($id) {
                     return $er->createQueryBuilder('u')
                         ->where('u.grouping = ?1')
                         ->setParameter(1, $id);}))
             ->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')));

        return $form;
    }
}