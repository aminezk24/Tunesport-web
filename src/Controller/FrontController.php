<?php

namespace App\Controller;
use App\Entity\Favoris;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="app_front")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $produits = $entityManager
            ->getRepository(Produit::class)
            ->findAll();
        return $this->render('front/index.html.twig', [
            'produits' => $produits,

            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/frontproduit", name="app_frontproduit")
     */
    public function indexaffproduit(EntityManagerInterface $entityManager): Response
    { $produits = $entityManager
        ->getRepository(Produit::class)
        ->findAll();
        return $this->render('front/afficheproduit.html.twig', [
            'produits' => $produits,
            'controller_name' => 'FrontController',
        ]);
    }

}
