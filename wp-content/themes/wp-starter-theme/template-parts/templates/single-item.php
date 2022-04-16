<div class="item" id="<?php echo get_the_ID(); ?>">
    <!-- image -->
    <div class="image-wrap">
        <img src="<?php echo wp_get_attachment_image_src(get_field("image"), "full_hd")[0]; ?>" alt="<?php the_title(); ?>">
    </div>
    <!-- title -->
    <div class="title-wrap">
        <h6><?php the_title(); ?></h6>
    </div>
    <!-- content -->
    <div class="content-wrap">
        <?php echo substr(get_field("content"), 0, 250) . '...'; ?>
    </div>
</div>