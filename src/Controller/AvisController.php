<?php

namespace App\Controller;

use App\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="avis")
     */
    public function index(): Response
    {
                //récupération du repository avis qu'on stock dans un objet

        $repo = $this->getDoctrine()->getRepository(Avis::class); 

        $avis = $repo->findAll();

        return $this->render('avis/index.html.twig', [
            'avis' => $avis,
            'current_menu' => 'avis'
        ]);
    }


    /**
     * @Route("/avis/new", name="avis_create")
     * @Route("/avis/{id}/edit", name="avis_edit")
     */
    public function form(Avis $avis = null,Request $request, EntityManagerInterface $manager){
        
        //Voir si la préstation existe pas il en créé une
        if(!$avis){
            $avis = new Avis();
        }
        //Sinon il modifie

        //Création d'un formulaire avec les champs nécessaire à la création d'une préstation
        $form = $this->createFormBuilder($avis)
                     ->add('nom')
                     ->add('prenom')
                     ->add('contenu')                   
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

        $avis->setDate(new \DateTimeImmutable());
        
        //Préparation de l'objet et insertion dans la base de données
            $manager->persist($avis);
            $manager->flush();

            return $this->redirectToRoute('avis');
        }

        return $this->render('avis/create.html.twig',[
            'formAvis' => $form->createView(),
            'editMode' =>$avis->getId() !== null,
            'current_menu' => 'avis'
        ]);
    }

    /**
     * @Route("/avis/{id}/delete", name="avis_delete")
     */

     //Suppression d'un avis
    public function delete(Avis $avis)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($avis);
        $manager->flush();

        return $this->redirectToRoute("avis");
    }
}
