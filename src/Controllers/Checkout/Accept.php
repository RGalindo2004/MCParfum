<?php

namespace Controllers\Checkout;

use Controllers\PublicController;
use Dao\Cart\Cart as CartDao;
use Dao\Pagos\Pagos as PagosDao;

class Accept extends PublicController
{
    public function run(): void
    {
        $dataview = array();
        $token = $_GET["token"] ?: "";
        $session_token = $_SESSION["orderid"] ?: "";

        $total = $_SESSION['checkout_total'] ?? 0;

        if ($token !== "" && $token == $session_token) {
            $PayPalRestApi = new \Utilities\PayPal\PayPalRestApi(
                \Utilities\Context::getContextByKey("PAYPAL_CLIENT_ID"),
                \Utilities\Context::getContextByKey("PAYPAL_CLIENT_SECRET")
            );
            $result = $PayPalRestApi->captureOrder($session_token);

            if (isset($result->purchase_units[0]->amount->value)) {
                $total = $result->purchase_units[0]->amount->value;
            } 

            $userId = \Utilities\Security::getUserId();
            if ($result->status == "COMPLETED") {

                $paymentData = [
                    'usercod' => $userId,
                    'total' => $total,
                    'metodoPago' => 'PayPal',
                    'estado' => 'COMPLETED'
                ];
                PagosDao::insertPago($paymentData);
            }

            CartDao::removeProductosCarretillaUser($userId);

            $dataview["orderjson"] = json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $dataview["orderjson"] = "No Order Available!!!";
        }
        \Views\Renderer::render("paypal/accept", $dataview);
    }
}