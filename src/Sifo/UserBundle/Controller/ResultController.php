<?php

namespace Sifo\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * MstGrup controller.
 *
 */
class ResultController extends Controller
{
    public function indexAction($id)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $program = $em->getRepository('SifoSharedBundle:Program')->find($id);

        $semesters = array();
        $entities = $em->getRepository('SifoSharedBundle:StudentsGrouping')->findByStudent($user);
        foreach ($entities as $temp) {
            $semesters[]['grouping'] = $temp->getGrouping()->getId();
            $semesters[]['romanic'] = $this->romanic_number(1 + (($temp->getGrouping()->getPeriod()->getDateStarted()->format('Y') - $user->getPeriod()->getDateStarted()->format('Y')) * 2) + $temp->getGrouping()->getSemester());
        }

        return $this->render('SifoUserBundle:Result:index.html.twig', array(
            'user'      => $user,
            'programs'  => $programs,
            'semesters' => $semesters,
            'program'   => $program,
        ));
    }

    public function chooseAction($id, $grouping)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $programs = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $program = $em->getRepository('SifoSharedBundle:Program')->find($id);

        $semesters = array();
        $entities = $em->getRepository('SifoSharedBundle:StudentsGrouping')->findByStudent($user);
        foreach ($entities as $temp) {
            $semesters[]['grouping'] = $temp->getGrouping()->getId();
            $semesters[]['romanic'] = $this->romanic_number(1 + (($temp->getGrouping()->getPeriod()->getDateStarted()->format('Y') - $user->getPeriod()->getDateStarted()->format('Y')) * 2) + $temp->getGrouping()->getSemester());
        }

        $results = array();
        $entity = $em->getRepository('SifoSharedBundle:Grouping')->find($grouping);
        $semester = $this->romanic_number(1 + (($entity->getPeriod()->getDateStarted()->format('Y') - $user->getPeriod()->getDateStarted()->format('Y')) * 2) + $entity->getSemester());

        $group = $em->getRepository('SifoSharedBundle:StudentsGrouping')->findOneBy(array('student' => $user, 'grouping' => $entity));
        $results = $em->getRepository('SifoSharedBundle:Result')->findBy(array('studentsGrouping' => $group, 'program' => $program));


        return $this->render('SifoUserBundle:Result:choose.html.twig', array(
            'user'      => $user,
            'programs'  => $programs,
            'semester'  => $semester,
            'semesters' => $semesters,
            'entity'    => $entity,
            'results'   => $results,
            'program'   => $program,
        ));
    }

    public function romanic_number($integer, $upcase = true) 
    { 
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
        $return = ''; 
        while($integer > 0) 
        { 
            foreach($table as $rom=>$arb) 
            { 
                if($integer >= $arb) 
                { 
                    $integer -= $arb; 
                    $return .= $rom; 
                    break; 
                } 
            } 
        } 

        return $return; 
    } 
}
