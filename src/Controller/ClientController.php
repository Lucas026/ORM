<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Loader\YamlFileLoader; 

/**
 * @Route("/client")
 * Class ClientController
 * @package App\Controller
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/info/{nom}", name="client_info") 
     * @param $nom
     * @return Response
     */
    public function info($nom)
    {
        return $this->render('monTemplate.html.twig',['nom'=>$nom]);
    }

    /**
     * @Route("/photo/{nom}", name="client_photo")
     * 
     * @return BinaryFileResponse
     */
    function photo($nom)
    {
        return new BinaryFileResponse(__DIR__."/../../data/Tintin.png");
    }

    /**
     * @Route("/prenom/{nom<[a-zA-Z]+-[a-zA-Z]+?>}", name="client_prenom") 
     * @param $nom
     * @return Response
     */
    public function prenom($nom)
    {
        $urlImg = $this->generateUrl('client_photo', ['nom'=>$nom]);
        return new Response("Le prénom de $nom est TinTin <img src=\"$urlImg\"/> ");
    } 

    /**
     * @Route("/affiche/{nom}", name="client_affiche_photo")
     * @param $nom
     * @return Response
     */
    function affichePhoto($nom)
    {
        return $this->render('_affiche_photo.html.twig',['nom'=>$nom]);
    }
}