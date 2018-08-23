<?php

namespace App\Controller;

use App\Entity\SickleCellHistory;
use App\Form\SickleCellHistoryType;
use App\Repository\SickleCellHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sickle/cell/history")
 */
class SickleCellHistoryController extends Controller
{
    /**
     * @Route("/", name="sickle_cell_history_index", methods="GET")
     */
    public function index(SickleCellHistoryRepository $sickleCellHistoryRepository): Response
    {
        return $this->render('sickle_cell_history/index.html.twig', ['sickle_cell_histories' => $sickleCellHistoryRepository->findAll()]);
    }

    /**
     * @Route("/new", name="sickle_cell_history_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $sickleCellHistory = new SickleCellHistory();
        $form = $this->createForm(SickleCellHistoryType::class, $sickleCellHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sickleCellHistory);
            $em->flush();

            return $this->redirectToRoute('sickle_cell_history_index');
        }

        return $this->render('sickle_cell_history/new.html.twig', [
            'sickle_cell_history' => $sickleCellHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sickle_cell_history_show", methods="GET")
     */
    public function show(SickleCellHistory $sickleCellHistory): Response
    {
        return $this->render('sickle_cell_history/show.html.twig', ['sickle_cell_history' => $sickleCellHistory]);
    }

    /**
     * @Route("/{id}/edit", name="sickle_cell_history_edit", methods="GET|POST")
     */
    public function edit(Request $request, SickleCellHistory $sickleCellHistory): Response
    {
        $form = $this->createForm(SickleCellHistoryType::class, $sickleCellHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sickle_cell_history_edit', ['id' => $sickleCellHistory->getId()]);
        }

        return $this->render('sickle_cell_history/edit.html.twig', [
            'sickle_cell_history' => $sickleCellHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sickle_cell_history_delete", methods="DELETE")
     */
    public function delete(Request $request, SickleCellHistory $sickleCellHistory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sickleCellHistory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sickleCellHistory);
            $em->flush();
        }

        return $this->redirectToRoute('sickle_cell_history_index');
    }
}
