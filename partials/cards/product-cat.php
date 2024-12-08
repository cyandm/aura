<?php
$postID = $args['post-id'] ?? get_the_ID();
$cat_name_with_id = $args['post-name'] ?? get_term($postID)->name;
$cat_link_with_id = get_term_link($postID, 'product_cat');
$cat_thumbnail_id = get_term_meta($postID, 'thumbnail_id', true);
?>

<?php if ($cat_thumbnail_id): ?>

    <a href="<?php echo esc_url($cat_link_with_id); ?>" class="border border-transparent hover:border-violet-400/30 text-neutral-950 hover:text-violet-400 transition-all duration-500 rounded-3xl shadow-cxl hover:shadow-cxt py-4 px-10 flex flex-col justify-center items-center gap-2 text-center whitespace-nowrap font-medium text-xl max-md:text-base">

        <?php echo wp_get_attachment_image($cat_thumbnail_id, 'full'); ?>

        <?php echo $cat_name_with_id; ?>

    </a>


<?php endif ?>