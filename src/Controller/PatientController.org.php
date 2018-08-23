<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index()
    {
		//fetch EntityManager
		//add an argument to your action: index(EntityManagerInterface $entityManager)
		$entityManager=$this->getDoctrine()->getManager();
		
		$patient= new Patient();
		$patient->setFirstName('Jane');
		$patient->setLastName('Doe');
		$patient->setPatientNo('Doe123');
		$patient->setSex('Male');
		$patient->setAge(15);
		$patient->setAllergies('Some text.....');
		$patient->setLocation('Value');
		
		//save doctrine!
		$entityManager->persist($patient);
		
		//actually execute queries
		$entityManager->flush();
		
        return $this->render('patient/index.html.twig', [
            'result' => 'Saved new patient with id '.$patient->getId(),
        ]);
    }
	
	/**
	*	@Route("/patient/{id}", name="show_patient")
	*/
	public function show($id)
	{
		$patient=$this->getDoctrine()
			->getRepository(Patient::class)
			->find($id);
		
		if(!$patient){
			throw $this->createNotFoundException(
				'No patient found with id '.$id
			);
		}
		
		return $this->render('patient/show.html.twig',['patient' => $patient]);
	}
	
	/**
	*	@Route("/patient/edit/{id}", name="edit_patient")
	**/
	public function update($id)
	{
		$entityManager=$this->getDoctrine()->getManager();
		$patient=$entityManager->getRepository(Patient::class)->find($id);
		
		if(!$patient){
			throw $this->createNotFoundException(
				'No patient found for id '.$id
			);
		}
		
		$patient->setFirstName('Jane');
		$entityManager->flush();
		
		return $this->redirectToRoute('show_patient', ['id' => $patient->getId()]);
	}
	
	/**
	*	@Route("/patient/delete/{id}", name="delete_patient")
	**/
	public function delete($id)
	{
		$entityManager=$this->getDoctrine()->getManager();
		$patient=$entityManager->getRepository(Patient::class)->find($id);
		
		if(!$patient){
			throw $this->createNotFoundException(
				'No patient found for id '.$id
			);
		}
		
		//Tell doctrine
		$entityManager->remove($patient);
		//execute 
		$entityManager->flush();
		
		$this->addFlash(
			'notice',
			$patient->getId().' been deleted!'
		);
		
		return $this->redirectToRoute('homepage');
	}
	
	/**
	*	@Route("/patient/list/{age_1}/{age_2}", name="patient_list")
	**/
	public function list($age_1,$age_2)
	{
		$patients=$this->getDoctrine()
			->getRepository(Patient::class)
			->getPatientsAged($age_1,$age_2);
			
		return $this->render('patient/list.html.twig',['patients' => $patients]);
	}
}
