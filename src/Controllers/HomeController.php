<?php

namespace Controllers;

use \Dao\Products\Products as ProductsDao;
use \Views\Renderer as Renderer;
use \Utilities\Site as Site;
use \Utilities\Security;

class HomeController extends PublicController
{
  public function run(): void
  {
    Site::addLink("public/css/products.css");
    $viewData = [];
    
    if (Security::isLogged()) {
        $viewData["usercod"] = Security::getUserId();
    } else {
        $viewData["usercod"] = null;
    }

    $viewData["productsOnSale"] = ProductsDao::getDailyDeals();
    $viewData["productsHighlighted"] = ProductsDao::getFeaturedProducts();
    $viewData["productsNew"] = ProductsDao::getNewProducts();
    
    Renderer::render("home", $viewData);
  }
}
?>