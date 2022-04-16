<section class="section-ajax_posts_list">
    <div class="container">
        <h2><?php echo get_sub_field("title"); ?></h2>

        <?php
            $args = [
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => get_sub_field("default_items"),
                'order' => 'ASC',
            ];

            $query = new WP_Query($args);
            $total = wp_count_posts('works');
        ?>

        <div
            id="items-list"
            data-default-items="<?php echo get_sub_field("default_items"); ?>"
            data-items-per-page="<?php echo get_sub_field("items_per_page"); ?>"
            data-total-items="<?php echo $total->publish; ?>"
            data-infinity-scroll="<?php echo get_sub_field("infinity_scroll"); ?>"
        >
            <?php if( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php echo get_template_part('template-parts/templates/single-item'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- load more or loader -->
        <?php if( !get_sub_field("infinity_scroll")) : ?>
            <?php if( get_sub_field("default_items") < $total->publish ) : ?>
                <div class="btn-wrap">
                    <div class="btn load-more-btn"><?php echo "Load More"; ?></div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="loader-wrap">
                <div class="loader">Loading...</div>
            </div>
        <?php endif; ?>
    </div>
</section>