<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Evenement;
use App\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvenController extends AbstractController
{
    /**
     * @Route("/even", name="app_even")
     */
    public function index(): Response
    {
        return $this->render('even/indexfad.html.twig', [
            'controller_name' => 'EvenController',
        ]);
    }


    /**
     * @Route("/admin", name="display_admin")
     */
    public function indexAdmin(): Response
{
    $data = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
    return $this->render('Admin/index.html.twig',
        ['evenement' => $data]);
}


    /**
     * @Route("ajouter", name="ajouter")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function ajouter(Request $request){
        $event = new Evenement();
        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash('notice','Done');
            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/Ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/drop/{idevent}", name="drop")
     */
    public function drop($idevent){
        $data = $this->getDoctrine()->getRepository(Evenement::class)->find($idevent);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $this->addFlash('notice','Evenement supprimer');
        return $this->redirectToRoute('display_admin');
    }



    /**
     * @Route("/update/{idevent}", name="update")
     */
    public function update(Request $request, $idevent){
        $event = $this->getDoctrine()->getRepository(Evenement::class)->find($idevent);
        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash('notice','Mise a jour effectuer');
            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/update.html.twig',[
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/categorie", name="display_categorie")
     */
    public function indexCategorie(): Response
    {
        $data = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('Categ/index.html.twig',
            ['categorie' => $data]);
    }



    /**
     * @Route("ajoutercat", name="ajoutercat")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function ajoutercat(Request $request){
        $cat = new Categorie();
        $form = $this->createForm(CategorieType::class, $cat);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            $this->addFlash('notice','Done');
            return $this->redirectToRoute('display_categorie');
        }
        return $this->render('Categ/Ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dropcat/{idcat}", name="dropcat")
     */
    public function dropcat($idcat){
        $data = $this->getDoctrine()->getRepository(Categorie::class)->find($idcat);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $this->addFlash('notice','Categorie supprimer');
        return $this->redirectToRoute('display_categorie');
    }




    /**
     * @Route("/updatecat/{idcat}", name="updatecat")
     */
    public function updatecat(Request $request, $idcat){
        $cat = $this->getDoctrine()->getRepository(Categorie::class)->find($idcat);
        $form = $this->createForm(CategorieType::class, $cat);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            $this->addFlash('notice','Mise a jour effectuer');
            return $this->redirectToRoute('display_categorie');
        }
        return $this->render('Categ/update.html.twig',[
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/frontadmin", name="display_frontadmin")
     */
    public function indexFrontadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('FrontAdmin/indexfad.html.twig',
            ['evenement' => $data]);
    }




    /**
     * @Route("/frontcat", name="display_frontcat")
     */
    public function indexFrontCategorie(): Response
    {
        $data = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('FrontCateg/index.html.twig',
            ['categorie' => $data]);
    }


    /**
     * @Route("/afffichevent", name="display_affichevent")
     */
    public function affichevent(): Response
    {
        $data = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('FrontAdmin/affichevent.html.twig',
            ['evenement' => $data]);
    }


    /**
     * @Route("/afffichcat", name="display_affichcat")
     */
    public function affichcat(): Response
    {
        $data = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('FrontCateg/affichecategorie.html.twig',
            ['categorie' => $data]);
    }

}