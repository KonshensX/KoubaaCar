<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/form", name="myForm")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction (Request $request) {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder(null)
            ->add('name', TextType::class)
            ->add('dateNais', DateType::class)
            ->add('save', SubmitType::class)
            ->getForm();


        //Handling the form request
        $form->handleRequest($request);

        //Checking if the form was submitted
        if ($form->isSubmitted()) {
            var_dump($request->getUser());
            die();
        }

        return $this->render('AppBundle:Post:index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
