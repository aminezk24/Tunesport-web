<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Entity\Livreur;


use App\Form\LivraisonType;
use App\Form\LivreurType;

use http\Encoding\Stream\Enbrotli;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivraisonController extends AbstractController
{
    /**
     * @Route("/livraison", name="app_livraison")
     */
    public function index(): Response
    {
        return $this->render('livraison/index.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);
    }


    /**
     * @Route("/AdminL", name="display_adminL")
     */
    public function indexadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Livraison::class)->findAll();
        return $this->render('Admin/indexLivraison.html.twig', [
            'livraison' => $data
        ]);
    }

    /**
     * @Route("affcreateliv/{id}", name="affcreateliv")
     * @param \Symfony\Component\BrowserKit\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function affectecreate(Request $request,FlashyNotifier $flashy,$id){
        $livraison = new Livraison();
        $livreur =new Livreur();
        $livreur= $this->getDoctrine()->getRepository(Livreur::class)->find($id);
            $livraison->setLivreur($livreur);
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){

            $sql ="update livreur set dispo='Nondispo' where id=:id";
            $conn = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['id' => $id]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();
            $flashy->success('Livraison created!', 'http://your-awesome-link.com');

            $this->addFlash('notice','Done');
            return $this->redirectToRoute('display_adminL');
        }
        return $this->render('Admin/createliv.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/dropliv/{id}", name="dropliv")
     */
    public function drop($id,FlashyNotifier $flashy){
        $data = $this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $flashy->error('Livraison Deleted!', 'http://your-awesome-link.com');

        $this->addFlash('notice','livraison supprimer');
        return $this->redirectToRoute('display_adminL');
    }


    /**
     * @Route("/updateliv/{id}", name="updateliv")
     */
    public function update(Request $request, $id,FlashyNotifier $flashy){
        $livraison = $this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();
            $flashy->primary('Livraison Updated!', 'http://your-awesome-link.com');

            $this->addFlash('notice','livraison effectuer');
            return $this->redirectToRoute('display_adminL');
        }
        return $this->render('Admin/updateliv.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/map", name="display_map")
     */
    public function mapaction(): Response{
        return $this->render('view/newmap.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);

    }
}
