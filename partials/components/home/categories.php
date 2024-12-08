<?php
$home_product_cats = get_terms([
    'taxonomy' => 'product_cat',
    'hide_empty' => true
]);

if(!$home_product_cats) return;
?>

<section class="container my-9">

    <div class="grid grid-cols-5 grid-rows-1 gap-5 max-lg:grid-rows-2 max-lg:grid-cols-3 max-sm:grid-rows-3 max-sm:grid-cols-2">

        <?php foreach ($home_product_cats as $index => $category) : ?>

            <?php
            cyn_get_card('product-cat', ['post-id' => $category->term_id, 'post-name' => $category->name]);
            ?>

        <?php endforeach ?>

    </div>

</section>