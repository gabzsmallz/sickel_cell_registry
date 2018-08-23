<?php

namespace App\Controller;

use App\Entity\BaselineData;
use App\Form\BaselineDataType;
use App\Repository\BaselineDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/baseline/data")
 */
class BaselineDataController extends Controller
{
    /**
     * @Route("/", name="baseline_data_index", methods="GET")
     */
    public function index(BaselineDataRepository $baselineDataRepository): Response
    {
        return $this->render('baseline_data/index.html.twig', ['baseline_datas' => $baselineDataRepository->findAll()]);
    }

    /**
     * @Route("/new", name="baseline_data_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $baselineDatum = new BaselineData();
        $form = $this->createForm(BaselineDataType::class, $baselineDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($baselineDatum);
            $em->flush();

            return $this->redirectToRoute('baseline_data_index');
        }

        return $this->render('baseline_data/new.html.twig', [
            'baseline_datum' => $baselineDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="baseline_data_show", methods="GET")
     */
    public function show(BaselineData $baselineDatum): Response
    {
        return $this->render('baseline_data/show.html.twig', ['baseline_datum' => $baselineDatum]);
    }

    /**
     * @Route("/{id}/edit", name="baseline_data_edit", methods="GET|POST")
     */
    public function edit(Request $request, BaselineData $baselineDatum): Response
    {
        $form = $this->createForm(BaselineDataType::class, $baselineDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('baseline_data_edit', ['id' => $baselineDatum->getId()]);
        }

        return $this->render('baseline_data/edit.html.twig', [
            'baseline_datum' => $baselineDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="baseline_data_delete", methods="DELETE")
     */
    public function delete(Request $request, BaselineData $baselineDatum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baselineDatum->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($baselineDatum);
            $em->flush();
        }

        return $this->redirectToRoute('baseline_data_index');
    }
}
