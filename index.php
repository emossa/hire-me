<?php get_header(); ?>


<div class="content">

<!-- SWIPER BEGIN -->

	<div class="swiper-container">
		<?php if ( is_category() || is_tag() ) { ?>

			<h1 class="main-title"><?php echo single_cat_title() ?></h1>

		<?php } ?>
			<div class="swiper-wrapper">

				<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

					<div class="swiper-slide">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<a class="post__featured-image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('hireme_single'); ?>)">

								</a>

								<?php wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'hireme' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								) ); ?>
								<div class="post__info">
									<a href="<?php the_permalink(); ?>"><h2 class="post__info__title"><?php the_title(); ?></h2></a>

									<div class="post__info__links">
										<a href="<?php echo  get_post_meta(get_the_ID(), 'Demo', true); ?>" target="_blank">
											<img class="post__info__links__icon" src="<?php echo get_template_directory_uri() . '/images/demo.svg'; ?>" alt="">
										</a>
										<a href="<?php echo  get_post_meta(get_the_ID(), 'Git hub', true); ?>" target="_blank">
											<img class="post__info__links__icon" src="<?php echo get_template_directory_uri() . '/images/github.svg'; ?>" alt="">
										</a>
									</div>



								</div>






						</article>
					</div>

				<?php endwhile; ?>

				<div class="pagination">

					<?php /* Pagination */

					global $wp_query;
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );

					?>

				</div>

			<?php else : ?>

			  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'hireme'); ?> </h3>

			<?php endif; ?>


			</div>

		<div class="swiper-pagination"></div>
		<!-- Add Arrows -->
	 <div class="swiper-button-next"></div>
	 <div class="swiper-button-prev"></div>
	 </div>

	</div>

<!-- SWIPER END -->

</div>

<aside class="sidebar">
		<?php get_sidebar(); ?>
</aside>


<?php get_footer(); ?>
