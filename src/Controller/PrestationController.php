<?php

namespace App\Controller;

use App\Entity\Prestations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="prestation")
     */
    public function index(): Response
    {
                //récupération du repository prestation qu'on stock dans un objet

        $repo = $this->getDoctrine()->getRepository(Prestations::class); 

        $prestations = $repo->findAll();

        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
            'current_menu' => 'prestation'
        ]);
    }


    /**
     * @Route("/prestation/new", name="prestation_create")
     * @Route("/prestation/{id}/edit", name="prestation_edit")
     */
    public function form(Prestations $prestation = null,Request $request, EntityManagerInterface $manager){
        
        //Voir si la préstation existe pas il en créé une
        if(!$prestation){
            $prestation = new Prestations();
        }
        //Sinon il modifie

        //Création d'un formulaire avec les champs nécessaire à la création d'une préstation
        $form = $this->createFormBuilder($prestation)
                     ->add('libelle')
                     ->add('prix')
                     ->add('description')
                     ->add('image')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

        //Préparation de l'objet et insertion dans la base de données
            $manager->persist($prestation);
            $manager->flush();

            return $this->redirectToRoute('prestation');
        }

        return $this->render('prestation/create.html.twig',[
            'formPrestation' => $form->createView(),
            'editMode' =>$prestation->getId() !== null,
            'current_menu' => 'prestation'
        ]);
    }

    /**
     * @Route("/prestation/{id}/delete", name="prestation_delete")
     */

     //Suppression d'une prestation
    public function delete(Prestations $prestation)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($prestation);
        $manager->flush();

        return $this->redirectToRoute("prestation");
    }
}
