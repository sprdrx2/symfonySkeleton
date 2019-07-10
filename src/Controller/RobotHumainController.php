<?php

namespace App\Controller;

use App\Entity\RobotHumain;
use App\Form\RobotHumainType;
use App\Repository\RobotHumainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/robot/humain")
 */
class RobotHumainController extends AbstractController
{
    /**
     * @Route("/", name="robot_humain_index", methods={"GET"})
     */
    public function index(RobotHumainRepository $robotHumainRepository): Response
    {
        return $this->render('robot_humain/index.html.twig', [
            'robot_humains' => $robotHumainRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="robot_humain_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $robotHumain = new RobotHumain();
        $form = $this->createForm(RobotHumainType::class, $robotHumain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($robotHumain);
            $entityManager->flush();

            return $this->redirectToRoute('robot_humain_index');
        }

        return $this->render('robot_humain/new.html.twig', [
            'robot_humain' => $robotHumain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="robot_humain_show", methods={"GET"})
     */
    public function show(RobotHumain $robotHumain): Response
    {
        return $this->render('robot_humain/show.html.twig', [
            'robot_humain' => $robotHumain,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="robot_humain_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RobotHumain $robotHumain): Response
    {
        $form = $this->createForm(RobotHumainType::class, $robotHumain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('robot_humain_index', [
                'id' => $robotHumain->getId(),
            ]);
        }

        return $this->render('robot_humain/edit.html.twig', [
            'robot_humain' => $robotHumain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="robot_humain_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RobotHumain $robotHumain): Response
    {
        if ($this->isCsrfTokenValid('delete'.$robotHumain->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($robotHumain);
            $entityManager->flush();
        }

        return $this->redirectToRoute('robot_humain_index');
    }
}
