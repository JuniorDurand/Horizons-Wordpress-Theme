<?php

/* -Add Stylesheets in theme- */

function TemaCurso_resources(){
	wp_enqueue_style('style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'TemaCurso_resources');

/* Add Js scripts */

wp_register_script('jquery', get_template_directory_uri(). '/js/jquery.min.js');
wp_enqueue_script('jquery');

wp_register_script('jquery-dropotron', get_template_directory_uri(). '/js/jquery.dropotron.min.js');
wp_enqueue_script('jquery-dropotron');

wp_register_script('skel', get_template_directory_uri(). '/js/skel.min.js');
wp_enqueue_script('skel');	

wp_register_script('skel-layers', get_template_directory_uri(). '/js/skel-layers.min.js');
wp_enqueue_script('skel-layers');	

wp_register_script('init', get_template_directory_uri(). '/js/init.js');
wp_enqueue_script('init');


?>