<?php

namespace App\Controller;

use App\Entity\DailyMedications;
use App\Form\DailyMedicationsType;
use App\Repository\DailyMedicationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/daily/medications")
 */
class DailyMedicationsController extends Controller
{
    /**
     * @Route("/", name="daily_medications_index", methods="GET")
     */
    public function index(DailyMedicationsRepository $dailyMedicationsRepository): Response
    {
        return $this->render('daily_medications/index.html.twig', ['daily_medications' => $dailyMedicationsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="daily_medications_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $dailyMedication = new DailyMedications();
        $form = $this->createForm(DailyMedicationsType::class, $dailyMedication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dailyMedication);
            $em->flush();

            return $this->redirectToRoute('daily_medications_index');
        }

        return $this->render('daily_medications/new.html.twig', [
            'daily_medication' => $dailyMedication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="daily_medications_show", methods="GET")
     */
    public function show(DailyMedications $dailyMedication): Response
    {
        return $this->render('daily_medications/show.html.twig', ['daily_medication' => $dailyMedication]);
    }

    /**
     * @Route("/{id}/edit", name="daily_medications_edit", methods="GET|POST")
     */
    public function edit(Request $request, DailyMedications $dailyMedication): Response
    {
        $form = $this->createForm(DailyMedicationsType::class, $dailyMedication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('daily_medications_edit', ['id' => $dailyMedication->getId()]);
        }

        return $this->render('daily_medications/edit.html.twig', [
            'daily_medication' => $dailyMedication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="daily_medications_delete", methods="DELETE")
     */
    public function delete(Request $request, DailyMedications $dailyMedication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dailyMedication->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dailyMedication);
            $em->flush();
        }

        return $this->redirectToRoute('daily_medications_index');
    }
}
