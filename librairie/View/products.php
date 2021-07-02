<?php

$nb_product = \Database::$db_array['fraxel']->getPDO()->query("SELECT COUNT(id) as i FROM \"Product\"")->fetch()['i'];
$max_tab = ceil($nb_product/16);

$tab = (isset($_GET['tab'])) ? (($_GET['tab'] != 0) ? $_GET['tab'] : 1) : 1;

$products = \Controller\ProductController::SELECT();
$new_products = [];

foreach ($products as $index => $product){
    $max_index = 16*$tab;
    $min_index = $max_index-16;
    if ($index > $min_index-1 && $index < $max_index){
        array_push($new_products, $product);
    }
}

?>

<div id="product">
    <div id="search">
        <form action="/search/" method="GET">
            <input autocomplete="off" name="s" type="text" placeholder="Recherche ...">
            <button type="submit"></button>
        </form>
    </div>
    <div id="products">
        <?php foreach ($new_products as $product) {
            require("librairie/View/template/product.php");
        }
        ?>
    </div>
    <div id="tabs">
        <?php for($i = 0; (($i >= ($tab-2) && $i <= ($tab+3)) && $i < $max_tab) ;$i++): ?>
            <a href="/products/<?=$i+1?>" class="<?= ($i == $tab-1) ? "active" : null?>"><?=$i+1?></a>
        <?php endfor ?>
    </div>
</div>