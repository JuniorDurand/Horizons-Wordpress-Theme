<?php


function TemaCurso_resources(){
	/* -Add Stylesheets in theme- */
	
	wp_enqueue_style('style',get_stylesheet_uri());
	
	
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
}

add_action('wp_enqueue_scripts', 'TemaCurso_resources');



/* register menus */

register_nav_menus(array(
	'primary' =>  __( 'Primary Menu'),
));


/* Customize theme API*/ 


add_action( 'customize_register', 'genesischild_register_theme_customizer' );
/*
 * Register Our Customizer Stuff Here
 */
function genesischild_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	// var_dump($wp_customize);
	$wp_customize->add_panel( 'front-page-settings', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Pagina Inicial', 'genesischild' ),
		'description'    => __( 'Modifica textos e icones da pagina inicial do site.', 'genesischild' ),
	) );
	// Add section.
	$wp_customize->add_section( 'first-section' , array(
		'title'    => __('Primeira Seção','genesischild'),
		'panel'    => 'front-page-settings',
		'priority' => 10
	) );
	
	//Add Title
	
	// Add setting
	$wp_customize->add_setting('first-section-title', array(
        'default'        => 'Nulla luctus eleifend',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

	// Add control
    $wp_customize->add_control('first-section-title', array(
        'label'      => __('Title', 'mcs'),
        'section'    => 'first-section',
        'settings'   => 'first-section-title',
	));
	
	//Sub-titulo

	// Add setting
	$wp_customize->add_setting('first-section-sub-title', array(
        'default'        => 'Mauris vulputate dolor sit amet nibh',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

	// Add control
    $wp_customize->add_control('first-section-sub-title', array(
        'label'      => __('Sub-titulo', 'mcs'),
        'section'    => 'first-section',
        'settings'   => 'first-section-sub-title',
    ));
	
	//Item 1
	//Imagem item 1

	// Add setting
	$wp_customize->add_setting('first-section-item-1-image', array(
        'default'        => '',
        'transport' => 'refresh',
      	'sanitize_callback' => 'absint'

    ));


	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'first-section-item-1-image',
		array(
			'label' => __( 'Imagem do primeiro item' ),
			'description' => esc_html__( 'Selecione a imagem do primeiro card da seção' ),
			'section' => 'first-section',
			'mime_type' => 'image',  // Required. Can be image, audio, video, application, text
			'button_labels' => array( // Optional
				'select' => __( 'Selecionar Imagem' ),
				'change' => __( 'Trocar Imagem' ),
				'default' => __( 'Default' ),
				'remove' => __( 'Remove' ),
				'placeholder' => __( 'Imagem não selecionada' ),
				'frame_button' => __( 'Escolher Imagem' ),
			)
		)
	));

	//Texto item 1

	// Add setting
	$wp_customize->add_setting('first-section-item-1-text', array(
        'default'        => 'Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat.',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

	// Add control
    $wp_customize->add_control('first-section-item-1-text', array(
        'label'      => __('Texto do primeiro item', 'mcs'),
        'section'    => 'first-section',
		'settings'   => 'first-section-item-1-text',
		'type'       => 'textarea',
    ));

}
?>