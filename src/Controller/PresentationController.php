<?php

namespace App\Controller;

use App\Entity\Presentation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;



class PresentationController extends AbstractController
{
   /**
     * @Route("/presentation", name="presentation")
     */
    public function index(): Response
    {
        //récupération du repository presentation qu'on stock dans un objet
        $prest = $this->getDoctrine()->getRepository(Presentation::class)->findAll();

        return $this->render('presentation/index.html.twig', [
            'presentations'=> $prest,
            'current_menu' => 'presentation'
        ]);
    }

    /**
     * @Route("/presentation/new", name="presentation_new")
     * @Route("/presentation/{id}/edit", name="presentation_edit")
     */
    public function formPresentation(Presentation $presentation = null, Request $request, EntityManagerInterface $manager)
    {
        //Voir si la présentation existe déja
        if(!$presentation){
            $presentation = new Presentation();
        }

        //Création d'un formulaire avec les champs nécessaire à la création d'une présentation
        $form = $this->createFormBuilder($presentation)
                     ->add('titre')
                     ->add('contenu')
                     ->add('image')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

           //Préparation de l'objet et insertion dans la base de données
            $manager->persist($presentation);
            $manager->flush();

            return $this->redirectToRoute('presentation');
        }

        //Envoi des informations dans la page html
        return $this->render('presentation/page.html.twig',[
            'formPresentation' => $form->createView(),
            'editMode' =>$presentation->getId() !== null,
            'current_menu' => 'presentation'
        ]);
    }

    
}
