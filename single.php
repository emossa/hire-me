<?php get_header(); ?>
<div class="page__filter"></div>
<div class="page__featured-image" style="background-image: url(<?php echo the_post_thumbnail_url('hireme_single'); ?>)">
	<a class="page__featured-image" href="<?php the_permalink(); ?>" >
	<h1 class="content__title"><?php the_title(); ?></h1>
	</a>
</div>


<div class="content">

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
<div class="content__post__singolo">
	<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>




<?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
		<?php the_content();?>
		<?php if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif; ?>

	</article>
</div>


	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.','hireme'); ?>  </h3>

	<?php endif; ?>

</div>

<aside class="sidebar">
		<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>
