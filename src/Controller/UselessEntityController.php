<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UselessEntity;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Form\UselessEntityType;


class UselessEntityController extends AbstractController
{
    /**
	 * @Route ("/useless", name = "uselessEntityIndex")
	 * @Route ("/useless/sort-by-{sortAttr}-{sortDir}", name = "uselessEntityIndexSorted", requirements = { "sortDir" = "asc|desc", "sortAttr" = "id|string|text|datetime|boolean|integer_value" } )	
     */
    public function listUselessAction($sortAttr = "id", $sortDir = "asc")
    {
		$uselessEntities = $this->getDoctrine()->getRepository(UselessEntity::class)->findBy(array(), [ $sortAttr => $sortDir ]);
					
        return $this->render('useless_entity/index.html.twig', [
            'useless_entities' => $uselessEntities,
        ]);
    }

    /**
     * @Route("/useless/{id}", name="uselessEntityShow", requirements = { "id" = "\d+" } )
     *
     */
    public function uselessEntityShowAction(UselessEntity $uselessEntity)
    {
		return $this->render('useless_entity/show.html.twig', [
		'useless_entity' => $uselessEntity,
		'deleteButton' => $this->createDeleteForm($uselessEntity)->createView(),
		]);
    }

    /**
     * @Route("/useless/new/old", name="uselessEntityNewActionOld" )
     */

    public function old_uselessEntityNewAction(Request $request) {
	    $newUseless = new UselessEntity();
	    $form = $this->createFormBuilder($newUseless)
		->add('string', TextType::class)
		->add('text', TextareaType::class)
		->add('datetime', DateTimeType::class)
		->add('boolean', CheckboxType::class)
		->add('integerValue', IntegerType::class)
		->add('save', SubmitType::class, ['label' => 'save this important work'])
		->getForm();

	    $form->handleRequest($request);
	    if($form->isSubmitted() && $form->isValid()) {
		    $m = $this->getDoctrine()->getManager();
		    $m->persist($newUseless);
		    $m->flush();
		    return $this->redirectToRoute('uselessEntityShow', [ 'id' => $newUseless->getId() ]);
	    } else {
	    	return $this->render('useless_entity/new.html.twig', [ 'form' => $form->createView() ]);
	    }
    }	

    /**
     * @Route("/useless/new", name="uselessEntityNewAction")
     *
     */	

     public function uselessEntityNewAction(Request $request) {
	    $newUseless = new UselessEntity();
	    $form = $this->createForm(UselessEntityType::class, $newUseless);
     	$form->handleRequest($request);
	    if($form->isSubmitted() && $form->isValid()) {
		    $m = $this->getDoctrine()->getManager();
		    $m->persist($newUseless);
		    $m->flush();
		    return $this->redirectToRoute('uselessEntityShow', [ 'id' => $newUseless->getId() ]);
	    } else {
	    	return $this->render('useless_entity/new.v2.html.twig', [ 'form' => $form->createView() ]);
	    }
     }
	
    /**
     * @Route("/useless/update/{id}", name="uselessEntityUpdateAction", requirements = { "id" = "\d+" } )
     *
     */	

     public function uselessEntityUpdateAction(Request $request, UselessEntity $uselessEntity) {
	   
	    $form = $this->createForm(UselessEntityType::class, $uselessEntity);
     	$form->handleRequest($request);
	    if($form->isSubmitted() && $form->isValid()) {
		    $m = $this->getDoctrine()->getManager();
		    $m->persist($uselessEntity);
		    $m->flush();
		    return $this->redirectToRoute('uselessEntityShow', [ 'id' => $uselessEntity->getId() ]);
	    } else {
	    	return $this->render('useless_entity/new.v2.html.twig', [ 'form' => $form->createView() ]);
	    }
     }	
	
	    
	/*
     * Crée un formulaire pour supprimer un Article
    */
    private function createDeleteForm(UselessEntity $uselessEntity)
    {
        //on crée un formulaire
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('uselessEntity_delete', array('id' => $uselessEntity->getId())))
            ->setMethod('DELETE')
            ->add('delete entity ' . $uselessEntity->getString(), SubmitType::class)
            ->getForm()
        ;
    }
	
	/**
	* @Route("/useless/delete/{id}", name="uselessEntity_delete", requirements = { "id" = "\d+" })
	* @Route("/useless/{id}/delete", name="uselessEntity_deleteAlt", requirements = { "id" = "\d+" })
	* @Route("/useless/{id}", name="uselessEntity_deleteREST", requirements = { "id" = "\d+" }, methods = { "DELETE" }) //TODO: pas marche
	*/
	public function uselessEntityDeleteAction(Request $request, UselessEntity $uselessEntity) {
		$m = $this->getDoctrine()->getManager();
		$m->remove($uselessEntity);
		$m->flush();
		return $this->redirectToRoute('uselessEntityIndex');
	}
	
}	
