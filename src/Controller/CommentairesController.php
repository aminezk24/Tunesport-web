<?php

namespace App\Controller;

use App\Entity\Commentaires;
use App\Form\CommentairesType;
use App\Repository\CommentairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commentaires")
 */
class CommentairesController extends AbstractController
{
    /**
     * @Route("/", name="app_commentaires_index", methods={"GET"})
     */
    public function index(CommentairesRepository $commentairesRepository): Response
    {
        return $this->render('commentaires/index.html.twig', [
            'commentaires' => $commentairesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_commentaires_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,MailerInterface $mailer): Response
    {
        $commentaire = new Commentaires();
        $form = $this->createForm(CommentairesType::class, $commentaire);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaire);
            $entityManager->flush();
            $this->sendEmail($mailer);
            return $this->redirectToRoute('app_commentaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaires/new.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCommentaire}", name="app_commentaires_show", methods={"GET"})
     */
    public function show(Commentaires $commentaire): Response
    {
        return $this->render('commentaires/show.html.twig', [
            'commentaire' => $commentaire,
        ]);
    }

    /**
     * @Route("/{idCommentaire}/edit", name="app_commentaires_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commentaires $commentaire, CommentairesRepository $commentairesRepository): Response
    {
        $form = $this->createForm(CommentairesType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentairesRepository->add($commentaire);
            return $this->redirectToRoute('app_commentaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaires/edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCommentaire}", name="app_commentaires_delete", methods={"POST"})
     */
    public function delete(Request $request, Commentaires $commentaire, CommentairesRepository $commentairesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaire->getIdCommentaire(), $request->request->get('_token'))) {
            $commentairesRepository->remove($commentaire);
        }

        return $this->redirectToRoute('app_commentaires_index', [], Response::HTTP_SEE_OTHER);
    }
    public function sendEmail(MailerInterface $mailer)
    {

        $email = (new Email())
            ->from('responsable.tunesport@gmail.com')
            ->to('utilisateur.tunesport@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('commentaire ajouté avec succé')
            ->text('Bien ajouté')
            ->html('')
        ;


        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            echo($e->getMessage())  ;
        }
        echo 'email sent';

        // ...
    }
}
