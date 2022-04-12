<?php

namespace App\Controller;
use App\Entity\Jeux;
use App\Entity\Miseajour;

use App\Form\JeuxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuxController extends AbstractController
{
    /**
     * @Route("/jeux", name="app_jeux")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'JeuxController',
        ]);
    }

    /**
     * @Route("/Admin", name="display_admin")
     */
    public function indexadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Jeux::class)->findAll();
        return $this->render('Admin/index.html.twig', [
            'jeux' => $data
        ]);
    }

    /**
     * @Route("create", name="create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function create(Request $request){
        $jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeux);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            $em->flush();
            $this->addFlash('notice','Done');
            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/create.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/drop/{idjeux}", name="drop")
     */
    public function drop($idjeux){
        $data = $this->getDoctrine()->getRepository(Jeux::class)->find($idjeux);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $this->addFlash('notice','jeux supprimer');
        return $this->redirectToRoute('display_admin');
    }


    /**
     * @Route("/update/{idjeux}", name="update")
     */
    public function update(Request $request, $idjeux){
        $jeux = $this->getDoctrine()->getRepository(Jeux::class)->find($idjeux);
        $form = $this->createForm(Jeuxtype::class, $jeux);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            $em->flush();
            $this->addFlash('notice','Mise a jour effectuer');
            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/update.html.twig',[
            'form' => $form->createView()
        ]);
    }

}
