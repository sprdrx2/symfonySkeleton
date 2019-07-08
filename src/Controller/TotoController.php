<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TotoController extends AbstractController
{
    /**
     * @Route("/toto", name="toto")
     */
    public function index()
    {
        return $this->render('toto/index.html.twig', [
            'controller_name' => 'TotoController',
        ]);
    }
}
