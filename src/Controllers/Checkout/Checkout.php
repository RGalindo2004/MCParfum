<?php

namespace Controllers\Checkout;

use Controllers\PrivateController;
use Dao\Cart\Cart as CartDao;
use Utilities\Security;

class Checkout extends PrivateController
{
    public function run(): void
    {
        $viewData = array();

        $userId = Security::getUserId();

        if ($userId == 0) {
            \Utilities\Site::redirectToWithMsg("index.php?page=Sec_Login", "Necesita iniciar sesión para continuar.");
        }

        $cartItems = CartDao::getProductosCarretillaUser($userId);

        if (empty($cartItems)) {
            \Utilities\Site::redirectToWithMsg("index.php?page=Carretilla-ViewCarretilla", "El carrito está vacío.");
        }

        $subtotal = 0;
        $total = 0;
        $totalImpuesto = 0;

        foreach ($cartItems as $item) {
            $impuesto = round($item['crrprc'] * 0.15, 2);
            $subtotal += $item['crrprc'] * $item['crrctd'];
            $totalImpuesto += $impuesto * $item['crrctd'];
            $total += ($item['crrprc'] * $item['crrctd']) + ($impuesto * $item['crrctd']);
        }

        $_SESSION['checkout_total'] = round($total, 2);

        $viewData['subtotal'] = round($subtotal, 2);
        $viewData['impuesto'] = round($totalImpuesto, 2);
        $viewData['total'] = round($total, 2);

        if ($this->isPostBack()) {
            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "order_" . (time() - 10000000),
                "http://localhost/NEGOCIOSWEB/MCParfum/index.php?page=Checkout_Error",
                "http://localhost/NEGOCIOSWEB/MCParfum/index.php?page=Checkout_Accept"
            );

            foreach ($cartItems as $item) {
                $impuesto = round($item['crrprc'] * 0.15, 2);

                $PayPalOrder->addItem(
                    $item['productName'],
                    "SKU" . $item['productId'],
                    $item['productId'],
                    $item['crrprc'],
                    $impuesto,
                    $item['crrctd'],
                    "DIGITAL_GOODS"
                );
            }

            $PayPalRestApi = new \Utilities\PayPal\PayPalRestApi(
                \Utilities\Context::getContextByKey("PAYPAL_CLIENT_ID"),
                \Utilities\Context::getContextByKey("PAYPAL_CLIENT_SECRET")
            );

            $PayPalRestApi->getAccessToken();
            $response = $PayPalRestApi->createOrder($PayPalOrder);

            $_SESSION["orderid"] = $response->id;

            foreach ($response->links as $link) {
                if ($link->rel == "approve") {
                    \Utilities\Site::redirectTo($link->href);
                }
            }

            die();
        }

        \Views\Renderer::render("paypal/checkout", $viewData);
    }
}
