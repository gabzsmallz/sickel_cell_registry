<?php

namespace App\Controller;

use App\Entity\HealthMaintenance;
use App\Form\HealthMaintenanceType;
use App\Repository\HealthMaintenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/health/maintenance")
 */
class HealthMaintenanceController extends Controller
{
    /**
     * @Route("/", name="health_maintenance_index", methods="GET")
     */
    public function index(HealthMaintenanceRepository $healthMaintenanceRepository): Response
    {
        return $this->render('health_maintenance/index.html.twig', ['health_maintenances' => $healthMaintenanceRepository->findAll()]);
    }

    /**
     * @Route("/new", name="health_maintenance_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $healthMaintenance = new HealthMaintenance();
        $form = $this->createForm(HealthMaintenanceType::class, $healthMaintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($healthMaintenance);
            $em->flush();

            return $this->redirectToRoute('health_maintenance_index');
        }

        return $this->render('health_maintenance/new.html.twig', [
            'health_maintenance' => $healthMaintenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="health_maintenance_show", methods="GET")
     */
    public function show(HealthMaintenance $healthMaintenance): Response
    {
        return $this->render('health_maintenance/show.html.twig', ['health_maintenance' => $healthMaintenance]);
    }

    /**
     * @Route("/{id}/edit", name="health_maintenance_edit", methods="GET|POST")
     */
    public function edit(Request $request, HealthMaintenance $healthMaintenance): Response
    {
        $form = $this->createForm(HealthMaintenanceType::class, $healthMaintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('health_maintenance_edit', ['id' => $healthMaintenance->getId()]);
        }

        return $this->render('health_maintenance/edit.html.twig', [
            'health_maintenance' => $healthMaintenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="health_maintenance_delete", methods="DELETE")
     */
    public function delete(Request $request, HealthMaintenance $healthMaintenance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$healthMaintenance->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($healthMaintenance);
            $em->flush();
        }

        return $this->redirectToRoute('health_maintenance_index');
    }
}
