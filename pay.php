<?php

# vendor using composer
require_once('vendor/autoload.php');

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

header('Content-Type: application/json');

# retrieve JSON from POST body
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);

try {
    if (isset($json_obj->payment_method_id)) {
        # Create the PaymentIntent
        $intent = \Stripe\PaymentIntent::create([
                    'amount' => 1099,
                    'currency' => 'inr',
                    'confirm' => true,
                    'payment_method' => $json_obj->payment_method_id,
                    'confirmation_method' => 'manual',
                    'use_stripe_sdk' => true,
        ]);
    }
    if (isset($json_obj->payment_intent_id)) {
        $intent = \Stripe\PaymentIntent::retrieve(
                        $json_obj->payment_intent_id
        );
        $intent->confirm();
    }
    generateResponse($intent);
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Display error on client
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Stripe\Exception\RateLimitException $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Stripe\Exception\InvalidRequestException $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Stripe\Exception\AuthenticationException $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Stripe\Exception\ApiConnectionException $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

function generateResponse($intent) {
    if ($intent->status == 'succeeded') {
        // Handle post-payment fulfillment
        echo json_encode(['success' => true]);
    } elseif ($intent->status == 'requires_action') {
        # Tell the client to handle the action
        echo json_encode([
            'requiresAction' => true,
            'clientSecret' => $intent->client_secret
        ]);
    } else {
        // Any other status would be unexpected, so error
        echo json_encode(['error' => 'Invalid PaymentIntent status']);
    }
}
