<?php

namespace Sifo\PublicBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sifo\PubliBundle\Form\DefaultType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('SifoSharedBundle:BlogCategory')->findOneByOrders(1);

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogCategory');
        $categories = $repository->getProcessesNativeQuery()->getQuery()->getResult();

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogMenu');
        $menus = $repository->getPublicMenu($category)->getQuery()->getResult();

        return $this->render('SifoPublicBundle::default.html.twig', array(
            'categories' => $categories,
            'menus'      => $menus,
            'category'   => $category
        ));
    }

    public function categoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('SifoSharedBundle:BlogCategory')->findOneByCode($category);

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogCategory');
        $categories = $repository->getProcessesNativeQuery()->getQuery()->getResult();

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogMenu');
        $menus = $repository->getPublicMenu($category)->getQuery()->getResult();

        if($category->getOrders() == 1){
            return $this->render('SifoPublicBundle::default.html.twig', array(
                'categories' => $categories,
                'menus'      => $menus,
                'category'   => $category
            ));
        }
        else{
            $page = null;
            return $this->render('SifoPublicBundle::page.html.twig', array(
                'categories' => $categories,
                'menus'      => $menus,
                'category'   => $category,
                'page'       => $page
            ));
        }
    }

    public function pageAction($category, $page)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('SifoSharedBundle:BlogCategory')->findOneById($category);
        $page = $em->getRepository('SifoSharedBundle:BlogPage')->findOneByCode($page);

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogCategory');
        $categories = $repository->getProcessesNativeQuery()->getQuery()->getResult();

        $repository = $this->getDoctrine()->getRepository('SifoSharedBundle:BlogMenu');
        $menus = $repository->getPublicMenu($category)->getQuery()->getResult();

        return $this->render('SifoPublicBundle::page.html.twig', array(
            'categories' => $categories,
            'menus'      => $menus,
            'category'   => $category,
            'page'       => $page
        ));
    }
}