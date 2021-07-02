<div class="product">
    <a href="/product/<?= $product->getName(); ?>">
        <img src="/picture/product/<?= $product->getIcon(); ?>" alt="Logo du produit">
        <div class="infos">
            <p><?= $product->getName(); ?></p>
            <p class="price"><?= $product->getPrice(); ?> €</p>
        </div>
    </a>
</div>