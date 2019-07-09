<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UselessEntity;

class UselessEntityController extends AbstractController
{
    /**
     * @Route("/useless", name="uselessEntityIndex")
     */
    public function listUselessAction()
    {
        return $this->render('useless_entity/index.html.twig', [
            'useless_entities' => $this->getDoctrine()->getRepository(UselessEntity::Class)->findAll()
        ]);
    }

    /**
     * @Route("/useless/{id}", name="uselessEntityShow", requirements = { "id" = "\d+" } )
     *
     */
    public function uselessEntityShowAction(UselessEntity $uselessEntity)
    {
		return $this->render('useless_entity/show.html.twig', [
		'useless_entity' => $uselessEntity
		]);
    }
}

