<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



class CartController extends AbstractController
{

    /**
     * @Route("/cart", name="cart")
     */
    public function index(SessionInterface $session, ProductsRepository $ProductRepository)
    {
        //recupere le panier actuel
        $pannier = $session->get('pannier', []);
        $pannierxithData = [];
        foreach ($pannier as $id => $quantity) {
            $pannierxithData[] = [
                'produit' => $ProductRepository->find($id),
                'quantity' => $quantity,
            ];
        }
        //get full cart  total
        //dd('total', $pannierxithData);
        $total = 0;
        foreach ($pannierxithData as $item) {
            $totalItem = $item['produit']->getPrixp() * $item['quantity'];
            $total += $totalItem;
        }
        //$items=$paginator->paginate($pannierxithData,$request->query->getInt('page',1),2);
        return $this->render('cart/index.html.twig', [
            'items' => $pannierxithData,
            'total' => $total,
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        $pannier = $session->get('pannier', []);

        if (!empty($pannier[$id])) {
            $pannier[$id]++;
        } else {
            $pannier[$id] = 1;
        }
        $session->set('pannier', $pannier);

        return $this->redirectToRoute('cart');

    }

    /*
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session)
    {
        $pannier = $session->get('pannier', []);
        if (!empty($pannier[$id])) {
            unset($pannier[$id]);
        }
        $session->set('pannier', $pannier);
        return $this->redirectToRoute('cart');
    }


    /**
     * @Route("/cart/remove/", name="cart_remove_all")
     */
    public function removeAll(SessionInterface $session)
    {
        $pannier = $session->get('pannier', []);
        unset($pannier);

        $session->set('pannier', []);
        return $this->redirectToRoute('cart');
    }
}