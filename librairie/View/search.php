<?php

$search = $_GET['s'];
$search_array = explode(' ', $search);

$where_array = [];
$where_string = "WHERE ";
foreach ($search_array as $key => $value) {
    if ($where_string != "WHERE ")
        $where_string .= " OR ";

    $where_array[":where_name_$key"] = "%$value%";
    $where_string .= "\"name\" LIKE :where_name_$key OR ";

    $where_array[":where_description_$key"] = "%$value%";
    $where_string .= "\"description\" LIKE :where_description_$key";
}

$SQL = "SELECT * FROM \"Product\" $where_string ORDER BY \"view\" DESC";

$prep = \Database::$db_array['fraxel']->getPDO()->prepare($SQL);
$products = null;
if ($prep->execute($where_array))
    $products = \Model\Product::format($prep->fetchAll());

?>

<div id="search">
    <form id="search_form" action="/search/" method="GET">
        <input autocomplete="off" name="s" type="text" placeholder="Recherche ..." value="<?=$search?>">
        <button type="submit"></button>
    </form>
    <div id="product_list">
        <?php
            foreach($products as $product){
                require("librairie/View/template/product.php");
            }
        ?>
    </div>
</div>
