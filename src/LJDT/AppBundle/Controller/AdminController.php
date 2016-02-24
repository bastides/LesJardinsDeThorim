<?php

// src/LJDT/AppBundle/Controller/AdminController.php

namespace LJDT\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listProducts = $em->getRepository('LJDTAppBundle:Product')->findAll();
        
        $listProfiles = $em->getRepository('LJDTAppBundle:Profile')->findAll();
        
        $listGalleries = $em->getRepository('LJDTAppBundle:Gallery')->findAll();
        
        return $this->render('::Admin/layout.html.twig', array(
            'listProducts' => $listProducts,
            'listProfiles' => $listProfiles,
            'listGalleries' => $listGalleries
        ));
    }
}