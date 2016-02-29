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
        $adminQueries = $this->get('ljdt_app.menu_admin');
        $queries = $adminQueries->menu(5);

        return $this->render('::Admin/admin.html.twig', array(
            'listProducts' => $queries['listProducts'],
            'listProfiles' => $queries['listProfiles'],
            'listGalleries' => $queries['listGalleries']
        ));
    }


}
