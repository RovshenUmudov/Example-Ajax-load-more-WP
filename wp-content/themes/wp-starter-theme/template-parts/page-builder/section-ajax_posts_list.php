<section class="section-ajax_posts_list">
    <div class="container">
        <h2><?php echo get_sub_field("title"); ?></h2>

        <?php
            $args = [
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => get_sub_field("default_number"),
                'order' => 'ASC',
            ];

            $query = new WP_Query($args);
            $total = wp_count_posts('works');
        ?>

        <div
            id="items-list"
            data-default-items="<?php echo get_sub_field("default_number"); ?>"
            data-request-items="<?php echo get_sub_field("request_items"); ?>"
            data-total-items="<?php echo $total->publish; ?>"
        >
            <?php if( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item">
                        <?php the_title(); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <!-- load more -->
        <?php if( get_sub_field("default_number") < $total->publish ) : ?>
            <div class="btn-wrap">
                <div class="btn load-more-btn"><?php echo get_sub_field('load_more_text'); ?></div>
            </div>
        <?php endif; ?>
    </div>
</section>