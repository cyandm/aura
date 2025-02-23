<?php



$title = get_field($args['group'] . '_title', $args['post-id']);
$link = get_field($args['group'] . '_link', $args['post-id']);

// Query for getting latest 12 products
$products = get_posts(array(
    'post_type' => 'product',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => '_stock_status',
            'value' => 'instock',
            'compare' => '='
        )
    )
));

if (empty($title) || empty($products) || empty($link))
    return;

?>



<section class="my-9 max-w-full">
    <div class="container">
        <div class="flex gap-2 flex-col items-center">
            <div class="w-full flex flex-row justify-between">

                <h2 class="text-title_2 font-normal lg:text-title_1 text-zinc-800">
                    <?php echo $title ?>
                </h2>

                <a href="<?php echo $link ?>"
                    class="group hidden lg:flex items-center justify-end gap-2 order-3 lg:order-2 mt-4 mb-6 lg:text-left text-zinc-800">
                    <span>
                        مشاهده همه
                    </span>
                    <svg class="icon -rotate-90 transition-all group-hover:-translate-x-2">
                        <use href="#icon-Arrow,-Up-1" />
                    </svg>
                </a>

            </div>

            <div class="flex gap-3 max-lg:flex-row max-lg:flex-wrap max-md:gap-2 w-full swiper products-swiper">
                <div class="swiper-wrapper">

                    <?php
                    foreach ($products as $product) :
                        cyn_get_card('product', ['post-id' => $product->ID]);
                    endforeach;
                    ?>
                </div>
            </div>

            <a href="#" class="block lg:hidden  order-3 lg:order-2 mt-4 mb-6 text-center lg:text-right">
                مشاهده همه
                <svg class="icon -rotate-90 transition-all group-hover:-translate-x-2">
                    <use href="#icon-Arrow,-Up-1" />
                </svg>
            </a>
        </div>
    </div>
</section>