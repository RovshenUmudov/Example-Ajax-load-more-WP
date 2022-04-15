<?php
add_action("wp_ajax_ajax_load_more", "ajax_load_more");
add_action("wp_ajax_nopriv_ajax_load_more", "ajax_load_more");

function ajax_load_more() {

    $offset = $_POST["offset"];
    $request = $_POST["requestItems"];

    $args = [
        'post_type' => 'works',
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $request,
        'order' => 'ASC',
    ];

    $query = new WP_Query($args); ?>

    <?php if( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="item">
                <?php the_title(); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

   <?php die();
}