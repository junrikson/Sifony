<?php

namespace Sifo\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * MstGrup controller.
 *
 */
class AttendanceController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $program = $em->getRepository('SifoSharedBundle:Program')->findAll();
        $entity = $em->getRepository('SifoSharedBundle:StudentsGrouping')->find($user->getId());
        $entities = $em->getRepository('SifoSharedBundle:Attendance')->findByStudentsGrouping($entity);

        return $this->render('SifoUserBundle:Attendance:index.html.twig', array(
            'user'     => $user,
            'entities' => $entities,
            'programs'  => $program,
        ));
    }
}
