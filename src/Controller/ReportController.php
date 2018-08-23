<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;

class ReportController extends AbstractController
{
    /**
     * @Route("/report", name="report")
     */
    public function index()
    {
        return $this->render('report/index.html.twig', [
            'controller_name' => 'ReportController',
        ]);
    }
	
	/**
	*	@Route("/report/patients", name="report_patient")
	**/
	public function patients()
	{
		$patients=$this->getDoctrine()
			->getRepository(Patient::class)
			->createQueryBuilder('p')
			->select('p.sex as label, count(p.id) as y' )
			->groupBy('p.sex')
			->getQuery()
			->getArrayResult();
		return $this->render('report/patients.html.twig', ['patients' => json_encode($patients, JSON_NUMERIC_CHECK )]);
	}
}
