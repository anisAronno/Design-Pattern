<?php

interface PaymentGateway {
    public function processPayment($amount);
}

// Concrete implementation of PayPal payment gateway
class PayPalGateway implements PaymentGateway {
    public function processPayment($amount) {
        echo "Processing payment of $amount using PayPal.\n";
    }
}

// Concrete implementation of Stripe payment gateway
class StripeGateway implements PaymentGateway {
    public function processPayment($amount) {
        echo "Processing payment of $amount using Stripe.\n";
    }
}

// Payment Gateway Factory
class PaymentGatewayFactory {
    public static function createPaymentGateway($gatewayType) {
        switch ($gatewayType) {
            case 'paypal':
                return new PayPalGateway();
            case 'stripe':
                return new StripeGateway();
            default:
                throw new \InvalidArgumentException("Invalid gateway type");
        }
    }
}

// Client code
$paypalGateway = PaymentGatewayFactory::createPaymentGateway('paypal');
$stripeGateway = PaymentGatewayFactory::createPaymentGateway('stripe');

$paymentAmount = 100.00;
$paypalGateway->processPayment($paymentAmount);
$stripeGateway->processPayment($paymentAmount);
