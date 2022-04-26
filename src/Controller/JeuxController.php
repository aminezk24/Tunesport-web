<?php

namespace App\Controller;
use App\Entity\Jeux;
use App\Entity\Miseajour;

use App\Form\JeuxType;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuxController extends AbstractController
{
    private $flashy;


    /**
     * @Route("/jeux", name="app_jeux")
     */
    public function index(FlashyNotifier $flashy): Response
    {
        $flashy->success('Welcome To Games!', 'http://your-awesome-link.com');

        $data = $this->getDoctrine()->getRepository(Jeux::class)->findAll();

        return $this->render('Admin/index.html.twig', [
            'jeux' => $data
        ]);
    }

    /**
     * @Route("/Admin", name="display_admin")
     */
    public function indexadmin(FlashyNotifier $flashy): Response
    {
        $data = $this->getDoctrine()->getRepository(Jeux::class)->findAll();
      //  $flashy->success('Welcome To Games!', 'http://your-awesome-link.com');


        return $this->render('Admin/index.html.twig', [
            'jeux' => $data
        ]);
    }

    /**
     * @Route("create", name="create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function create(Request $request,FlashyNotifier $flashy){
        $jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeux);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $file = $request->files->get('jeux')['imageJ'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename=md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $uploads_directory,
                $filename
            );
            $jeux->setImageJ($filename);
            /*echo "<pre>";
            var_dump($file);
            die;*/
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            $em->flush();
            $flashy->success('game created!', 'http://your-awesome-link.com');


            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/create.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/drop/{idjeux}", name="drop")
     */
    public function drop($idjeux,FlashyNotifier $flashy){
        $data = $this->getDoctrine()->getRepository(Jeux::class)->find($idjeux);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();
        $flashy->error('game Deleted!', 'http://your-awesome-link.com');

        return $this->redirectToRoute('display_admin');
    }


    /**
     * @Route("/update/{idjeux}", name="update")
     */
    public function update(Request $request, $idjeux,FlashyNotifier $flashy){
        $jeux = $this->getDoctrine()->getRepository(Jeux::class)->find($idjeux);
        $form = $this->createForm(Jeuxtype::class, $jeux);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            $em->flush();
            $flashy->primary('game Updated!', 'http://your-awesome-link.com');

            return $this->redirectToRoute('display_admin');
        }
        return $this->render('Admin/update.html.twig',[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/frontjeux", name="display_frontjeux")
     */
    public function indexFrontadmin(): Response
    {
        $data = $this->getDoctrine()->getRepository(Jeux::class)->findAll();
        return $this->render('Frontjeux/index.html.twig',
            ['jeux' => $data]);
    }

    /**
     * @Route("/affichejeux", name="display_affichejeux")
     */
    public function indexFront(): Response
    {
        $data = $this->getDoctrine()->getRepository(Jeux::class)->findAll();
        return $this->render('Frontjeux/affiche.html.twig',
            ['jeux' => $data]);
    }
}
