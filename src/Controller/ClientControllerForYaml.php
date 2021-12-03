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
 * @Route("/yaml/client")
 */
class ClientControllerForYaml extends AbstractController
{

    /**
     * @Route("/info/{nom}", name="clients_info") 
     */
    public function info($nom)
    {
        $urlImg = $this->generateUrl('client_photo', ['nom'=>$nom]);
        return new Response("Le prénom de $nom est TinTin <img src=\"$urlImg\"/> ");
    }

    /**
     * @Route("/photo", name="clients_photo")
     */
    function photo()
    {
        return new BinaryFileResponse(__DIR__."/../../data/Tintin.png");
    }

    /**
     * @Route("/prenom/{nom}", name="clients_prenom")
     */
    public function prenom($nom)
    {
        $urlImg = $this->generateUrl('client_photo', ['nom'=>$nom]);
        return new Response("Le prénom de $nom est TinTin <img src=\"$urlImg\"/> ");
    } 
}