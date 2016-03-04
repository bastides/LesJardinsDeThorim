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
        return $this->render('::Admin/admin.html.twig');
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function productsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listProducts = $em->getRepository('LJDTAppBundle:Product')->findAll();

        return $this->render('::Admin/products.html.twig', array(
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Produit bien enregistré');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        return $this->render('::Admin/addproduct.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function profilesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listProfiles = $em->getRepository('LJDTAppBundle:Profile')->findAll();

        return $this->render('::Admin/profiles.html.twig', array(
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Profil bien enregistré');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        return $this->render('::Admin/addprofile.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function galleryAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listGallery = $em->getRepository('LJDTAppBundle:Gallery')->findAll();

        return $this->render('::Admin/gallery.html.twig', array(
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($gallery);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Photo bien enregistrée');

            return $this->redirectToRoute('ljdt_admin_home');
        }

        return $this->render('::Admin/addgallery.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id, $section, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();

        $ressource = $em->getRepository('LJDTAppBundle:' . ucfirst($section))->find($id);

        if ($ressource) {
            $em->remove($ressource);
            $em->flush();

            switch ($section) {
                case 'product':
                    $session->getFlashBag()->add('info', 'Le produit a été supprimé');
                    return $this->redirectToRoute('ljdt_admin_home');
                break;
                case 'profile':
                    $session->getFlashBag()->add('info', 'Le profil a été supprimé');
                    return $this->redirectToRoute('ljdt_admin_home');
                break;
                case 'gallery':
                    $session->getFlashBag()->add('info', 'La photo a été supprimé');
                    return $this->redirectToRoute('ljdt_admin_home');
                break;
            }
        }

        return $this->redirectToRoute('ljdt_admin_home');
    }
}
