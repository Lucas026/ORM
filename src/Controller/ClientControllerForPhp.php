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
 * @Route("/php/client")
 */
class ClientControllerForPhp extends AbstractController
{
    /**
     * @Route("/info/{nom}", name="clients_infos") 
     */
    public function info($nom)
    {
        $urlImg = $this->generateUrl('client_photo', ['nom'=>$nom]);
        return new Response("Le prénom de $nom est TinTin <img src=\"$urlImg\"/> ");
    }

    /**
     * @Route("/photo", name="clients_photos")
     */
    function photo()
    {
        return new BinaryFileResponse(__DIR__."/../../data/Tintin.png");
    }

    /**
     * @Route("/prenom/{nom}", name="clients_prenoms")
     */
    public function prenom($nom)
    {
        $urlImg = $this->generateUrl('client_photo', ['nom'=>$nom]);
        return new Response("Le prénom de $nom est TinTin <img src=\"$urlImg\"/> ");
    } 
}