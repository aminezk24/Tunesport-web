<?php

namespace App\Controller;
use Twilio\Rest\Client;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="app_payment"), methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }

    /**
     * @Route("/checkout", name="app_checkout"), methods={"GET"})
     */
    public function checkout($stripeSK): Response
    {
        Stripe::setApiKey($stripeSK);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                        'unit_amount'  => 2000,
                    ],
                    'quantity'   => 1,
                ]
            ],
            'mode'                 => 'payment',
            'success_url'          => $this->generateUrl('app_success_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url'           => $this->generateUrl('app_success_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($session->url, 303);
    }

    /**
     * @Route("/success_url", name="app_success_url"), methods={"GET"})
     */

    public function successUrl(): Response
    {
        $sid    = "AC19b0e55100ddd4eedee1bd8698aba4ab";
        $token  = "2bec6983c8efe77f2687d11a563e07d8";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+21699026017", // to
                array(
                    "messagingServiceSid" => "MGfab6dcc660946e7a4cfaaa4d8d62bc7f",
                    "body" => "Reservation Made Successfully"
                )
            );
        return $this->render('payment/success.html.twig', []);
    }

    /**
     * @Route("//cancel_url", name="app_cancel_url"), methods={"GET"})
     */
    public function cancelUrl(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }
}
