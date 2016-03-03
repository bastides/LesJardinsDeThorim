<?php

// src/LJDT/AppBundle/Controller/AdminController.php

namespace LJDT\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LJDT\AppBundle\Entity\Product;
use LJDT\AppBundle\Form\ProductType;
use LJDT\AppBundle\Entity\Profile;
use LJDT\AppBundle\Form\ProfileType;
use LJDT\AppBundle\Entity\Gallery;
use LJDT\AppBundle\Form\GalleryType;
use LJDT\AppBundle\Entity\Photo;
use LJDT\AppBundle\Form\PhotoType;


class AdminController extends Controller
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
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

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
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

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addProductAction(Request $request)
    {
        $product = new Product();
        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if ($form->handleRequest($request)->isValid()) {
            $product->getPhoto()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Produit bien enregistré');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        return $this->render('::Admin/addproduct.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
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

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addProfileAction(Request $request)
    {
        $profile = new Profile();
        $form = $this->get('form.factory')->create(ProfileType::class, $profile);

        if ($form->handleRequest($request)->isValid()) {
            $profile->getPhoto()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Profil bien enregistré');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        return $this->render('::Admin/addprofile.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
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

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addGalleryAction(Request $request)
    {
        $gallery = new Gallery();
        $form = $this->get('form.factory')->create(GalleryType::class, $gallery);

        if ($form->handleRequest($request)->isValid()) {
            $gallery->getPhoto()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallery);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Photo bien enregistrée');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        $adminMenu = $this->get('ljdt_app.menu_admin');
        $queries = $adminMenu->menu(5);

        return $this->render('::Admin/addgallery.html.twig', array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries'],
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('LJDTAppBundle:Product')->find($id);
        $profile = $em->getRepository('LJDTAppBundle:Profile')->find($id);
        $gallery = $em->getRepository('LJDTAppBundle:Gallery')->find($id);

        $session = $request->getSession();

        if ($product == null) {
            if ($profile == null) {
                if ($gallery == null) {
                    return;
                } else {
                    $em->remove($gallery);
                    $em->flush();
                    $session->getFlashBag()->add('info', 'La photo a été supprimé');
                    return $this->redirectToRoute('ljdt_admin_home');
                }
            } else {
                $em->remove($profile);
                $em->flush();
                $session->getFlashBag()->add('info', 'Le profil a été supprimé');
                return $this->redirectToRoute('ljdt_admin_home');
            }
        } else {
            $em->remove($product);
            $em->flush();
            $session->getFlashBag()->add('info', 'Le produit a été supprimé');
            return $this->redirectToRoute('ljdt_admin_home');
        }

        $session->getFlashBag()->add('info', 'Aucun élément n\'a été supprimé');
        return $this->redirectToRoute('ljdt_admin_home');
    }
}
