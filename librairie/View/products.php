<?php

$search = null;
$tab = (isset($_GET['tab'])) ? (($_GET['tab'] != 0) ? $_GET['tab'] : 1) : 1;
$max_index = 16*$tab;
$min_index = $max_index-16;

if (!isset($_GET['s'])){
    $all_product = \Controller\ProductController::SELECT(\Database::SELECT_ALL, null, null, ['view'=>'DESC']);
    $max_tab = ceil(count($all_product)/16);
    $products = [];
    
    foreach ($all_product as $index => $product)
        if ($index > $min_index-1 && $index < $max_index)
            array_push($products, $product);
}else{
    $search = $_GET['s'];
    $search_array = explode(' ', $search);

    $where_array = [];
    $where_string = "WHERE ";
    foreach ($search_array as $key => $value) {
        if ($where_string != "WHERE ")
            $where_string .= " OR ";

        $where_array[":where_name_$key"] = "%$value%";
        $where_array[":where_description_$key"] = "%$value%";
        $where_string .= "\"name\" LIKE :where_name_$key OR \"description\" LIKE :where_description_$key";
    }

    $prep = \Database::$db_array['fraxel']->getPDO()->prepare("SELECT * FROM \"Product\" $where_string ORDER BY \"view\" DESC");
    $products = null;
    if ($prep->execute($where_array))
        $products = \Model\Product::format($prep->fetchAll());

    $max_tab = ceil(count($products)/16);
}

?>

<div id="product">
    <div id="search">
        <form id="search_form" action="/" method="GET">
            <input autocomplete="off" name="s" type="text" placeholder="Recherche ..." value="<?=$search?>">
            <button type="submit"></button>
        </form>
    </div>
    <div id="product_list">
        <?php 
        foreach ($products as $product)
            require("librairie/View/template/product.php");
        ?>
    </div>
    <div id="tabs">
        <?php for($i = 0; (($i >= ($tab-2) && $i <= ($tab+3)) && $i < $max_tab) ;$i++): ?>
            <a href="/products/<?=$i+1?><?=($search) ? "/$search" : null?>" <?= ($i == $tab-1) ? "class='active'" : null?>><?=$i+1?></a>
        <?php endfor ?>
    </div>
</div>
