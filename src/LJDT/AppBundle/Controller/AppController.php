<?php

// src/LJDT/AppBundle/Controller/AppController.php

namespace LJDT\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LJDT\AppBundle\Entity\Contact;
use LJDT\AppBundle\Form\ContactType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AppController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $listProducts = $em->getRepository('LJDTAppBundle:Product')->findBy(
            array(),
            array('id' => 'asc'),
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

        $contact = new Contact();
        $form = $this->get('form.factory')->create(ContactType::class, $contact);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('ljdt_app_home');
        }

        return $this->render('::App/app.html.twig', array(
            'listProducts' => $listProducts,
            'listProfiles' => $listProfiles,
            'listGalleries' => $listGalleries,
            'form' => $form->createView()
        ));
    }
}
