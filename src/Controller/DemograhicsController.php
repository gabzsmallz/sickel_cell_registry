<?php

namespace App\Controller;

use App\Entity\Demograhics;
use App\Form\DemograhicsType;
use App\Repository\DemograhicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demograhics")
 */
class DemograhicsController extends Controller
{
    /**
     * @Route("/", name="demograhics_index", methods="GET")
     */
    public function index(DemograhicsRepository $demograhicsRepository): Response
    {
        return $this->render('demograhics/index.html.twig', ['demograhics' => $demograhicsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="demograhics_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $demograhic = new Demograhics();
        $form = $this->createForm(DemograhicsType::class, $demograhic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demograhic);
            $em->flush();

            return $this->redirectToRoute('demograhics_index');
        }

        return $this->render('demograhics/new.html.twig', [
            'demograhic' => $demograhic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demograhics_show", methods="GET")
     */
    public function show(Demograhics $demograhic): Response
    {
        return $this->render('demograhics/show.html.twig', ['demograhic' => $demograhic]);
    }

    /**
     * @Route("/{id}/edit", name="demograhics_edit", methods="GET|POST")
     */
    public function edit(Request $request, Demograhics $demograhic): Response
    {
        $form = $this->createForm(DemograhicsType::class, $demograhic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demograhics_edit', ['id' => $demograhic->getId()]);
        }

        return $this->render('demograhics/edit.html.twig', [
            'demograhic' => $demograhic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demograhics_delete", methods="DELETE")
     */
    public function delete(Request $request, Demograhics $demograhic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demograhic->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demograhic);
            $em->flush();
        }

        return $this->redirectToRoute('demograhics_index');
    }
}
