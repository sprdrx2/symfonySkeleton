<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky", name="lucky")
     */
    public function index()
    {
        return $this->render('lucky/index.html.twig', [
            'controller_name' => 'LuckyController',
        ]);
    }

      

    /**
     * @Route("/lucky/number/{max<\d+>}", name="luckyNumberMax")
     *
     */
    
    public function luckyNumber($max = 0) {
	if($max > 0) {  $random_number = rand(1, $max); }
	else {		$random_number = rand(); }

     	return $this->render('lucky/number.html.twig', ["random_number" => $random_number]);
     }

}
