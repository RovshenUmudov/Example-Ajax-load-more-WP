<?php

function works_post_type() {

    register_post_type( 'works',
        array(
            'labels' => array(
                
                'name' => __('Works', 'textdomain'),
                'singular_name' => __('Works', 'textdomain'),
                'add_new_item'  => __('New Works' ,'textdomain'),
                'view_item'     => __('View Works', 'textdomain')
            ),
            'public' 	   => true,
            'has_archive'  => false,
            'hierarchical' => true,
            'supports' => array('title'),
            'rewrite'  => array('slug' => 'works'),
        )
    );
}

add_action( 'init', 'works_post_type' );