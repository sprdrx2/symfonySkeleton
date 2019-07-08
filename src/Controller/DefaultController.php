<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private static $defaultLocale = "fr";	

     /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
    * @Route("/blog/{_locale}/{year}/{title}", name="blog", requirements = { "_locale" = "fr|en", "year" = "\d{4}", "title" = "[[:alnum:]-]+" } )
    *
    */
    public function blogAction($_locale, $year, $title)
    {
	    return $this->render("default/blog.$_locale.html.twig", [
           	'_locale' => $_locale,
		'year' 	  => $year,
		'title'	  => str_replace($title,'-',' '),	
        ]);
    }

  /**
    * @Route("/blog/{year}/{title}", name="blogDefaultLocale", requirements = { "year" = "\d{4}", "title" = "[[:alnum:]-]+" } )
    *
    */
    public function blogDefaultLocaleAction($year, $title)
    {
	    //return $this->blogAction($this::$defaultLocale, $year, $title);
	    return $this->redirectToRoute('blog', [ '_locale' => $this::$defaultLocale, 'year' => $year, 'title' => $title ] );
    }



}
