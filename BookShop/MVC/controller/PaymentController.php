<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\PaymentController.php

class PaymentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createPayment()
    {
        //dd($_SESSION);
        try {
            \Stripe\Stripe::setApiKey($this->stripeSecretKey);
            // Get paymentMethodId from client
            $paymentMethodId = $_POST['paymentMethodId'] ?? null;

            if (!$paymentMethodId) {
                throw new Exception('Payment method not found');
            }
            if (isset($_SESSION['cart_confirm'])) {
                $cartDetails = $_SESSION['cart_confirm']['cart_details'];
                $total = $_SESSION['cart_confirm']['total'];
            } else {
                throw new Exception('Cart information not found.');
            }
            // Create a payment intent with Stripe
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $total * 100, // Amount in cents
                'currency' => 'usd',
                'payment_method' => $paymentMethodId,
                'confirm' => true, // Confirm the payment immediately
            ]);

            // Payment success.
            echo json_encode(['success' => true]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle Stripe API errors
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            exit();
        } catch (Exception $e) {
            // Handle general errors
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            exit();
        }
    }


    public function success()
    {
        $this->show('view/product/success');
    }
    public function failed()
    {
        $this->show('view/product/failed');
    }
}
