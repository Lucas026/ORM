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
 * @Route("/img")
 * Class ImageControler
 * @package App\Controller
 */
class ImageControler extends AbstractController
{

    /**
     * @Route("/home", name="img_home") 
     * 
     * @return Response
     */
    public function home()
    {
        return $this->render('img/home.html.twig');
    }

    /**
     * @Route("/affiche", name="img_affiche") 
     * 
     * @return Response
     */
    public function affiche()
    {
        return $this->file(__DIR__.'/../../data/siphano.jpg');
    }
}