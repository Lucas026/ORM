<?php

namespace App\Controller;

use App\Form\Type\InscriptionType;
use App\Form\Type\LoginType;

use App\Entity\Inscription;
use App\Entity\Utilisateur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/formulaire")
 * Class FormulaireController
 * @package App\Controller
 */
class FormulaireController extends AbstractController
{
    
    /**
     * @Route("/inscription", name="formulaire_inscription") 
     * 
     * @param Request $request
     * @return Response
     */
    public function inscription(Request $request, ManagerRegistry $doctrine)
    {

        $EntityManager = $doctrine->getManager();

        $dataEntity = new Utilisateur();
        
        $form = $this->createForm(InscriptionType::class, $dataEntity);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $EntityManager->persist($dataEntity);
            $EntityManager->flush();

            return $this->render('acces_login.html.twig');
        }else{
            $infoRendu = $form->createView();
            return $this->render('formulaire.html.twig', ["infoForm" => $infoRendu]);
        }
    }

    /**
     * @Route("/user/liste", name="affiche_user") 
     * 
     * @return Response
     */
    public function user(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Utilisateur::class);

        $info = $repository->findAll();
        
        return $this->render('afficheCompte.html.twig', [
            'info' => $info
        ]);
    }

    /**
     * @Route("/login", name="formulaire_login") 
     * 
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {        

        $data = new Inscription();

        $form = $this->createForm(LoginType::class, $data);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() && $data->getEmail() == "toto@gmail.com" && $data->getMotDePasse() == "toto0202"){
            return $this->forward('App\Controller\FormulaireController::bravo');
        }else{
            $loginRendu = $form->createView();
            return $this->render('login.html.twig', ["loginForm" => $loginRendu]);
        }
    }

    /**
     * @Route("/bravo", name="formulaire_bravo") 
     * @param TranslatorInterface $translator
     * 
     * @return Response
     */
    public function bravo(TranslatorInterface $translator)
    {
        return new Response($translator->trans("bravo tu es connecter"));
    }

}