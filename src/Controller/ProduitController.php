<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Upload;
use App\Entity\Utilisateur;
use App\Form\Categorieproduit1Type;
use App\Form\ProduitType;
use App\Form\UploadType;
use App\Repository\ProduitRepository;
use App\Service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf as dompdf;
use Dompdf\Options;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{

    /**
     * @Route("/", name="app_produit_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $produits = $entityManager
            ->getRepository(Produit::class)
            ->findAll();

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/new", name="app_produit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();
            // On boucle sur les images
            foreach($image as $ima){
                $fichier = md5(uniqid()) . '.' . $ima->guessExtension();

                $ima->move(
                    $this->getParameter('img_directory'),
                    $fichier
                );
            }
            $entityManager = $this->getDoctrine()->getManager();
            $produit->setImage($fichier);
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{idp}", name="app_produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{idp}/edit", name="app_produit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idp}", name="app_produit_delete", methods={"POST"})
     */
    public function delete(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getIdp(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }




    /**
     * @Route("/addfavoris/{id}", name="add_favoris_produit")
     */
    public function addparticipation(Request $request,$id): Response
    {
        $User = new Utilisateur();
        $Produit = new Produit();
        $User = $this->getDoctrine()->getRepository(Utilisateur::class)->find(112);
        $Produit = $this->getDoctrine()->getRepository(Produit::class)->find($id);
        $User->addIdp($Produit);


        $em = $this->getDoctrine()->getManager();
        $em->persist($User);
        $em->flush();
        return $this->redirectToRoute("app_frontproduit");
    }

    /**
     * @Route("/front/new/mylist", name="app_participation_indexq", methods={"GET"})
     */
    public function indexq(EntityManagerInterface $entityManager): Response
    {
        {
            $users = $entityManager
                ->getRepository(Utilisateur::class)
                ->findBy(array('id' => '112'));

            return $this->render('Favoris/indexfront.html.twig', [
                'users' => $users,
            ]);
        }

    }
    /**
     * @Route("/produit/data", name="produit_data")
     */
    public function data(EntityManagerInterface $entityManager): Response
    { $produits = $entityManager
        ->getRepository(Produit::class)
        ->findAll();


 return $this->render('produit/data.html.twig', [
     'produits' => $produits,
 ]);


    }
    /**
     * @Route("/produit/data/download", name="produit_data_download")
     */
    public function produitDataDownload(EntityManagerInterface $entityManager): Response
    {
        $produits = $entityManager


                        ->getRepository(Produit::class)
            ->findAll();


        // On définit les options du PDF
        $pdfOptions = new Options();
        // Police par défaut
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // On instancie Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($context);

        // On génère le html
        $html = $this->renderView('produit/download.html.twig', [
            'produits' => $produits,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // On génère un nom de fichier
        $fichier = 'produit-data.pdf';

        // On envoie le PDF au navigateur
        $dompdf->stream($fichier, [
            'Attachment' => true
        ]);

        return new Response();
    }




}
