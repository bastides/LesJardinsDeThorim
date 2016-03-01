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
        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        return $this->render('::Admin/admin.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries']
        ));
    }

    public function productsAction()
    {
        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        $em = $this->getDoctrine()->getManager();
        $listProducts = $em->getRepository('LJDTAppBundle:Product')->findAll();

        return $this->render('::Admin/products.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'listProducts' => $listProducts
        ));
    }

    public function profilesAction()
    {
        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        $em = $this->getDoctrine()->getManager();
        $listProfiles = $em->getRepository('LJDTAppBundle:Profile')->findAll();

        return $this->render('::Admin/profiles.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'listProfiles' => $listProfiles
        ));
    }

    public function galleryAction()
    {
        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        $em = $this->getDoctrine()->getManager();
        $listGallery = $em->getRepository('LJDTAppBundle:Gallery')->findAll();

        return $this->render('::Admin/gallery.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'listGallery' => $listGallery
        ));
    }
}
