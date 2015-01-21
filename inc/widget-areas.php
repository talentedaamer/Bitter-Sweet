<?php

// THEME SIDEBARS/WIDGET AREAS
function bittersweet_register_sidebar() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'bitter-sweet' ),
		'id' => 'sidebar-main',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'bitter-sweet' ),
		'before_widget' => '<aside id="%1$s" class="well widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 1', 'bitter-sweet' ),
		'id' => 'footer-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'bitter-sweet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 2', 'bitter-sweet' ),
		'id' => 'footer-2',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'bitter-sweet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 3', 'bitter-sweet' ),
		'id' => 'footer-3',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'bitter-sweet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 4', 'bitter-sweet' ),
		'id' => 'footer-4',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'bitter-sweet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}


add_action( 'widgets_init', 'bittersweet_register_sidebar' );