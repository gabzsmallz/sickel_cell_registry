<?php

namespace App\Controller;

use App\Entity\InterimHistory;
use App\Form\InterimHistoryType;
use App\Repository\InterimHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interim/history")
 */
class InterimHistoryController extends Controller
{
    /**
     * @Route("/", name="interim_history_index", methods="GET")
     */
    public function index(InterimHistoryRepository $interimHistoryRepository): Response
    {
        return $this->render('interim_history/index.html.twig', ['interim_histories' => $interimHistoryRepository->findAll()]);
    }

    /**
     * @Route("/new", name="interim_history_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $interimHistory = new InterimHistory();
        $form = $this->createForm(InterimHistoryType::class, $interimHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($interimHistory);
            $em->flush();

            return $this->redirectToRoute('interim_history_index');
        }

        return $this->render('interim_history/new.html.twig', [
            'interim_history' => $interimHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interim_history_show", methods="GET")
     */
    public function show(InterimHistory $interimHistory): Response
    {
        return $this->render('interim_history/show.html.twig', ['interim_history' => $interimHistory]);
    }

    /**
     * @Route("/{id}/edit", name="interim_history_edit", methods="GET|POST")
     */
    public function edit(Request $request, InterimHistory $interimHistory): Response
    {
        $form = $this->createForm(InterimHistoryType::class, $interimHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interim_history_edit', ['id' => $interimHistory->getId()]);
        }

        return $this->render('interim_history/edit.html.twig', [
            'interim_history' => $interimHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interim_history_delete", methods="DELETE")
     */
    public function delete(Request $request, InterimHistory $interimHistory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interimHistory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($interimHistory);
            $em->flush();
        }

        return $this->redirectToRoute('interim_history_index');
    }
}
