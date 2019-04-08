<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>



  <div class="container clearfix">
    <div class="header-container__sidemenu">
      <?php /* Main Navigation */
      wp_nav_menu( array(
      'theme_location' => 'header',
      'depth' => 2,
      'container' => false,
      'menu_class' => 'header__menu'
      )
      );
      ?>
    </div>

    <a href="javascript:void(0)" id="header-container__icon" class="header-container__icon"><span id="dashone"></span><span id="dashtwo"></span><span id="dashthree"></span></a>

    </div>
    <!-- ############## HEADER ############## -->
  <?php if(is_front_page()){ ?>
     <h1 style="display: none;"> <?php bloginfo('name'); ?> </h1>
    <header class="header clearfix">

      <div class="header-container">
        <img class="header-container__caption" src="<?php echo get_template_directory_uri() . "/images/caption1.svg" ?>" alt="">
        <a href="javascript:void(0)" class="header-container__down"> <img src="<?php echo get_template_directory_uri() . "/images/down.svg" ?>" alt=""> </a>
        <a href=" <?php echo esc_attr( get_option('resume_url') ); ?> " target="_blank" class="header-container__resume"> <img src="<?php echo get_template_directory_uri() . "/images/curriculum.svg" ?>" alt=""> </a>

        <div class="header-container__left">

        </div>
        <div class="header-container__right">

        </div>
      <?php } ?>

<?php if(is_front_page()){ ?>
    </header>
<?php } else if ( is_search() ) { ?>

  <h1 class="main-title"> <?php esc_html_e('Results for:', 'hireme'); ?> <strong><i><?php echo $s; ?></i></strong></h1>

<?php } ?>

    <!-- ############## HEADER ############## -->
