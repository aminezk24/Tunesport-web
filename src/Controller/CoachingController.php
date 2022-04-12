<?php

namespace App\Controller;

use App\Entity\Coaching;
use App\Form\CoachingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coaching")
 */
class CoachingController extends AbstractController
{
    /**
     * @Route("/", name="app_coaching_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $coachings = $entityManager
            ->getRepository(Coaching::class)
            ->findAll();

        return $this->render('coaching/index.html.twig', [
            'coachings' => $coachings,
        ]);
    }

    /**
     * @Route("/new", name="app_coaching_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $coaching = new Coaching();
        $form = $this->createForm(CoachingType::class, $coaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($coaching);
            $entityManager->flush();

            $this->addFlash('Success', 'Coach Created! Time To Set Up Reservations');

            return $this->redirectToRoute('app_coaching_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coaching/new.html.twig', [
            'coaching' => $coaching,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcoa}", name="app_coaching_show", methods={"GET"})
     */
    public function show(Coaching $coaching): Response
    {
        return $this->render('coaching/show.html.twig', [
            'coaching' => $coaching,
        ]);
    }

    /**
     * @Route("/{idcoa}/edit", name="app_coaching_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Coaching $coaching, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoachingType::class, $coaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('Success', 'Coach Updated! Time For A Break!');
            return $this->redirectToRoute('app_coaching_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coaching/edit.html.twig', [
            'coaching' => $coaching,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcoa}", name="app_coaching_delete", methods={"POST"})
     */
    public function delete(Request $request, Coaching $coaching, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coaching->getIdcoa(), $request->request->get('_token'))) {
            $entityManager->remove($coaching);
            $entityManager->flush();
            $this->addFlash('Success', 'Coach Removed! Better Get Another One Fast!');
        }

        return $this->redirectToRoute('app_coaching_index', [], Response::HTTP_SEE_OTHER);
    }
}
