<?php

namespace App\Controller;


use App\Entity\Livreur;
use App\Form\LivreurType;
use App\Form\SearchType;
use App\Services\QrcodeService;
use App\Services\QrcodeServices;
use http\Encoding\Stream\Enbrotli;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LivreurController extends AbstractController
{
    /**
     * @Route("/livreur", name="app_livreur")
     */
    public function index(): Response
    {
        return $this->render('livreur/index.html.twig', [
            'controller_name' => 'LivreurController',
        ]);
    }

    /**
     * @Route("/AdminLivreur", name="display_adminLivreur")
     */
    public function indexadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Livreur::class)->findAll();
        return $this->render('Admin/indexLivreur.html.twig', [
            'livreur' => $data
        ]);
    }

    /**
     * @Route("createlivreur", name="createlivreur")
     * @param \Symfony\Component\BrowserKit\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request,FlashyNotifier $flashy){
        $livreur = new Livreur();
        $form = $this->createForm(LivreurType::class, $livreur);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $livreur->setdispo("Disponible");
            $em->persist($livreur);
            $em->flush();
            $flashy->success('Livreur created!', 'http://your-awesome-link.com');

            return $this->redirectToRoute('display_adminLivreur');
        }
        return $this->render('Admin/createlivreur.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/droplivreur/{id}", name="droplivreur")
     */
    public function drop($id,FlashyNotifier $flashy){
        $data = $this->getDoctrine()->getRepository(Livreur::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $flashy->error('Livraison Deleted!', 'http://your-awesome-link.com');
        return $this->redirectToRoute('display_adminLivreur');
    }


    /**
     * @Route("/updatelivreur/{id}", name="updatelivreur")
     */
    public function update(Request $request, $id,FlashyNotifier $flashy){
        $livreur = $this->getDoctrine()->getRepository(Livreur::class)->find($id);
        $form = $this->createForm(LivreurType::class, $livreur);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($livreur);
            $em->flush();
            $flashy->primary('Livraison Updated!', 'http://your-awesome-link.com');

            return $this->redirectToRoute('display_adminLivreur');
        }
        return $this->render('Admin/updatelivreur.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/qr", name="display_qr")
     * @param Request $request
     * @param QrcodeServices $qrcodeService
     * @return Response
     */
    public function index1(Request $request, QrcodeServices $qrcodeService ): Response
    {
        $qrCode = null;
        $form = $this->createForm(SearchType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $qrCode = $qrcodeService->qrcode($data['name']);
        }

        return $this->render('Admin/qr.html.twig', [
            'form' => $form->createView(),
            'qrCode' => $qrCode
        ]);
    }

}
