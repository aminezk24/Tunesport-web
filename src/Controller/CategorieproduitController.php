<?php

namespace App\Controller;

use App\Entity\Categorieproduit;
use App\Form\Categorieproduit1Type;
use App\Repository\CategorieproduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorieproduit")
 */
class CategorieproduitController extends AbstractController
{
    /**
     * @Route("/", name="app_categorieproduit_index", methods={"GET"})
     */
    public function index(CategorieproduitRepository $categorieproduitRepository): Response
    {
        return $this->render('categorieproduit/index.html.twig', [
            'categorieproduits' => $categorieproduitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_categorieproduit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CategorieproduitRepository $categorieproduitRepository): Response
    {
        $categorieproduit = new Categorieproduit();
        $form = $this->createForm(Categorieproduit1Type::class, $categorieproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieproduitRepository->add($categorieproduit);
            return $this->redirectToRoute('app_categorieproduit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorieproduit/new.html.twig', [
            'categorieproduit' => $categorieproduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_categorieproduit_show", methods={"GET"})
     */
    public function show(Categorieproduit $categorieproduit): Response
    {
        return $this->render('categorieproduit/show.html.twig', [
            'categorieproduit' => $categorieproduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_categorieproduit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Categorieproduit $categorieproduit, CategorieproduitRepository $categorieproduitRepository): Response
    {
        $form = $this->createForm(Categorieproduit1Type::class, $categorieproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieproduitRepository->add($categorieproduit);
            return $this->redirectToRoute('app_categorieproduit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorieproduit/edit.html.twig', [
            'categorieproduit' => $categorieproduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_categorieproduit_delete", methods={"POST"})
     */
    public function delete(Request $request, Categorieproduit $categorieproduit, CategorieproduitRepository $categorieproduitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieproduit->getId(), $request->request->get('_token'))) {
            $categorieproduitRepository->remove($categorieproduit);
        }

        return $this->redirectToRoute('app_categorieproduit_index', [], Response::HTTP_SEE_OTHER);
    }
}
