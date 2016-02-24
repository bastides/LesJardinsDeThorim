<?php

// src/LJDT/AppBundle/Controller/AppController.php

namespace LJDT\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listProducts = $em->getRepository('LJDTAppBundle:Product')->findBy(
            array(),
            array('id' => 'desc'),
            3,
            0
        );
        
        $listProfiles = $em->getRepository('LJDTAppBundle:Profile')->findBy(
            array(),
            array('id' => 'asc'),
            4,
            0
        );
        
        $listGalleries = $em->getRepository('LJDTAppBundle:Gallery')->findBy(
            array(),
            array('id' => 'asc'),
            4,
            0
        );
        
        return $this->render('::App/layout.html.twig', array(
            'listProducts' => $listProducts,
            'listProfiles' => $listProfiles,
            'listGalleries' => $listGalleries
        ));
    }
}