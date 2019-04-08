<?php

/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'hireme_setup' ) ) {

	function hireme_setup() {

		add_theme_support( "title-tag" );

		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Enable featured image
		add_theme_support( 'post-thumbnails' );


		// Thumbnail sizes
		add_image_size( 'hireme_single', 800, 493, true ); //(cropped)
		add_image_size( 'hireme_big', 1400, 928, true ); 	//(cropped)

		// Custom menu areas
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'hireme' ),
		) );

		// Load theme languages
		load_theme_textdomain( 'hireme', get_template_directory().'/languages' );

	}

}
add_action( 'after_setup_theme', 'hireme_setup' );







/*  Register comment reply
/* ------------------------------------ */
if ( is_singular( 'post' ) && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

/*  Register content width
/* ------------------------------------ */
		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}
/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'hireme_sidebars' ) ) {

	function hireme_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'hireme' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'hireme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}

}
add_action( 'widgets_init', 'hireme_sidebars' );


/*  Include Styles and script
/* ------------------------------------ */
if ( ! function_exists( 'hireme_styles_scripts' ) ) {

	function hireme_style_scripts() {

		//wp_enqueue_script('jquery');
   wp_enqueue_script('hireme-swipe-script', get_template_directory_uri() . '/js/swiper.min.js');

		wp_enqueue_script( 'hireme-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );

		wp_enqueue_style( 'hireme-montserrat','//fonts.googleapis.com/css?family=Montserrat');

		wp_enqueue_style( 'hireme-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css');

		wp_enqueue_style( 'hireme-swiper-style', get_template_directory_uri().'/css/swiper.min.css');

		wp_enqueue_style( 'hireme', get_template_directory_uri().'/style.css');



	}

}
add_action( 'wp_enqueue_scripts', 'hireme_style_scripts' );


/*  Oembed Responsive
/* ------------------------------------ */
add_filter( 'embed_oembed_html', 'hireme_oembed_filter', 10, 4 ) ;

function hireme_oembed_filter($html, $url, $attr, $post_ID) {
	$return = '<figure class="video-container">'.$html.'</figure>';
	return $return;
}

// ADMIN PAGE

	function hireme_add_admin_page(){
	  add_theme_page('hireme custom page', 'hireme', 'manage_options', 'hireme-custom','hireme_theme_create_page','', 110);
		//Activate custom manage_options
		add_action('admin_init','hireme_custom_options');
	}
		add_action('admin_menu', 'hireme_add_admin_page' );
		function hireme_theme_create_page(){
			 require_once( get_template_directory(). '/inc/custom-options.php');
		}
		function hireme_custom_options(){
			register_setting('hireme-settings-group', 'resume_url');
			add_settings_section('hireme-resume-settings','Resume', 'hireme_resume_settings','hireme-custom');
			add_settings_field('resume-url','Resume URL: ','hireme_resume_url','hireme-custom','hireme-resume-settings');
		}
		function hireme_resume_settings(){
			echo 'Add resume informations ';
		}

		function hireme_resume_url(){
			$resumeUrl = esc_attr( get_option('resume_url') );
			echo '<input type="text" name="resume_url" value="'.$resumeUrl.'" placeholder="www.resume.url/resume.pdf">';
		}
