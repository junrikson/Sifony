<?php

namespace Sifo\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\SharedBundle\Entity\Attendance;
use Sifo\SharedBundle\Entity\StudentsGrouping;
use Sifo\AdminBundle\Form\AttendancesCollectionType;
use Sifo\AdminBundle\Lib\Paginator;

/**
 * Attendance controller.
 *
 */
class AttendanceController extends Controller
{

    /**
     * Lists all Attendance entities.
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
            ->setAction($this->generateUrl('admin_attendance_attendance_filter'))
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
                    $tanggal = $form->get('tanggal')->getData();
                    foreach ($entities as $temp) {
                        $entity = new Attendance();
                        $entity = $em->getRepository('SifoSharedBundle:Attendance')->findOneBy(array('studentsGrouping' => $temp, 'date' => $tanggal));
                        if (!$entity){
                            $entity = new Attendance();
                            $entity->setStudentsGrouping($temp)
                                ->setDate($tanggal)
                                ->setOperator($user->getName());
                            $em->persist($entity); 
                        }           
                    }
                    $em->flush();

                    /* Collection Form */
                    $attendances = new StudentsGrouping();
                    foreach ($entities as $temp) {
                        $entity = new Attendance();
                        $entity = $em->getRepository('SifoSharedBundle:Attendance')->findOneBy(array('studentsGrouping' => $temp, 'date' => $tanggal));
                        if ($entity)
                        {
                            $attendances->getAttendances()->add($entity);
                        }
                    }

                    $formCollection = $this->createCollectionForm($attendances, $id, $tanggal);
                    $formCollection = $formCollection->createView();
                }
                elseif ($form->get('delete')->isClicked())
                {
                    $tanggal = $form->get('tanggal')->getData();
                    foreach ($entities as $temp) {
                        $entity = new Attendance();
                        $entity = $em->getRepository('SifoSharedBundle:Attendance')->findOneBy(array('studentsGrouping' => $temp, 'date' => $tanggal));
                        if ($entity){
                            $em->remove($entity); 
                        }           
                    }
                    $em->flush();
                }
            } 
            else{
                /* Collection Form */
                $tanggal = new \DateTime($request->request->get('sifo_adminbundle_studentsgrouping')['tanggal']);
                $attendances = new StudentsGrouping();
                foreach ($entities as $temp) {
                    $entity = new Attendance();
                    $entity = $em->getRepository('SifoSharedBundle:Attendance')->findOneBy(array('studentsGrouping' => $temp, 'date' => $tanggal));
                    if ($entity)
                    {
                        $attendances->getAttendances()->add($entity);
                    }
                }

                $formCollection = $this->createCollectionForm($attendances, $id, $tanggal);
                $formCollection = $formCollection->createView();
            }
        }
        elseif ('PUT' === $request->getMethod()){
            $tanggal = new \DateTime($request->request->get('sifo_adminbundle_studentsgrouping')['tanggal']);

            $attendances = new StudentsGrouping();
            foreach ($entities as $temp) {
                $entity = new Attendance();
                $entity = $em->getRepository('SifoSharedBundle:Attendance')->findOneBy(array('studentsGrouping' => $temp, 'date' => $tanggal));
                 if ($entity){
                    $attendances->getAttendances()->add($entity);
                }
            }
            $formCollection = $this->createCollectionForm($attendances, $id, $tanggal);
            $formCollection->handleRequest($request);

            if ($formCollection->isValid()){
                $em->flush();
                $formCollection = $formCollection->createView();
                $form->get('tanggal')->setData($tanggal);
            }
        }

        return $this->render('SifoAdminBundle:manage:attendance.html.twig', array(
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
            ->setAction($this->generateUrl('admin_attendance_attendance_manage', array('id' => $id)))
            ->setMethod('POST')
            ->add('tanggal', 'date', array('widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
                'attr' => array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '16'), 
                'label' => 'Tanggal', 
                'label_attr' => array('class' => 'col-sm-2 col-sm-2 control-label')))
            ->add('refresh', 'submit', array('attr' => array('class' => 'btn btn-info', 'style' => 'float: left')))
            ->add('delete', 'submit', array('attr' => array('class' => 'btn btn-danger', 'style' => 'clear: both; margin-left : 5px')))
        ->getForm();
    }

    /**
    * Creates Collection form
    */
    private function createCollectionForm(StudentsGrouping $attendances, $id, $tanggal)
    {
        $form = $this->createForm(new AttendancesCollectionType(), $attendances, array(
            'action' => $this->generateUrl('admin_attendance_attendance_manage', array('id' => $id)),
            'method' => 'PUT',
        ));

        $form->add('save', 'submit', array('attr' => array('class' => 'btn btn-info')));
        $form->add('tanggal', 'date', array(
            'data' => $tanggal,
            'mapped' => false,
            'widget' => 'single_text', 
            'format' => 'yyyy-MM-dd', 
            'label' => false, 
            'attr' => array('style' => 'display: none;'))
        );

        return $form;
    }
}
