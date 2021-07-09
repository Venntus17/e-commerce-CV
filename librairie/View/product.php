<?php
    $product_name = $_GET['product'];
    $product = \Controller\ProductController::SELECT(\Database::SELECT_ALL, ['name'=>$product_name], 1)[0];
    $product->setView($product->getView()+1);
    \Controller\ProductController::UPDATE(['view'=>$product->getView()], ['name'=>$product_name]);
?>

<div id="prod">
    <div>
        <img src="/picture/product/<?=$product->getIcon()?>" alt="Logo du produit">
        <div>
            <p><?=$product->getName()?></p>
            <button>Télécharger</button>
        </div>
    </div>
    <p><?=$product->getDescription()?></p>
</div>