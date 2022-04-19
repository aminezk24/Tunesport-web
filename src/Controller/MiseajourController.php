<?php

namespace App\Controller;
use App\Entity\Miseajour;


use App\Form\MiseType;
use App\Form\JeuxType;
use App\Entity\Jeux;


use http\Encoding\Stream\Enbrotli;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MiseajourController extends AbstractController
{
    /**
     * @Route("/miseajour", name="app_miseajour")
     */
    public function index(): Response
    {
        return $this->render('miseajour/index.html.twig', [
            'controller_name' => 'MiseajourController',
        ]);
    }


    /**
     * @Route("/Adminm", name="display_adminM")
     */
    public function indexadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Miseajour::class)->findAll();
        return $this->render('Admin/indexM.html.twig', [
            'mise' => $data
        ]);
    }

    /**
     * @Route("createm", name="createm")
     * @param \Symfony\Component\BrowserKit\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request){
        $mise = new Miseajour();
        $form = $this->createForm(MiseType::class, $mise);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($mise);
            $em->flush();
            $this->addFlash('notice','Done');
            return $this->redirectToRoute('display_adminM');
        }
        return $this->render('Admin/createm.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/dropm/{id}", name="dropm")
     */
    public function drop($id){
        $data = $this->getDoctrine()->getRepository(Miseajour::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $this->addFlash('notice','mise a jour supprimer');
        return $this->redirectToRoute('display_adminM');
    }


    /**
     * @Route("/updatem/{id}", name="updatem")
     */
    public function update(Request $request, $id){
        $mise = $this->getDoctrine()->getRepository(Miseajour::class)->find($id);
        $form = $this->createForm(Misetype::class, $mise);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($mise);
            $em->flush();
            $this->addFlash('notice','Mise a jour effectuer');
            return $this->redirectToRoute('display_adminM');
        }
        return $this->render('Admin/updateM.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/affichemise", name="display_affichemise")
     */
    public function indexFront(): Response
    {
        $data = $this->getDoctrine()->getRepository(Miseajour::class)->findAll();
        return $this->render('Frontjeux/affichemise.html.twig',
            ['mise' => $data]);
    }



}
