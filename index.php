<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EDGES
 */

get_header(); ?>

	<div id="primary" class="content-area">
<div class="full-post-wrapper">
	<div class="full-post-slider">
		<?php

				// The Query
				$articles = new WP_Query(array('posts_per_page' => 3));

				// The Loop
				if ( $articles->have_posts() ) {
					while ( $articles->have_posts() ) : $articles->the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						 get_template_part( 'template-parts/content', 'full' );
					endwhile;
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

		?>

	</div>
</div>
<!-- the slider -->
		<main id="main" class="site-main ajax_posts">

			<h2 class="main-content--header"><?php _e('NEWS', 'edges');?></h2>
			<div class="index-post--container">
			<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$postsPerPage = 9;
					$args=array(
					   'post_type'              => 'post',
					   'posts_per_page'         => $postsPerPage,
					   'orderby'                => 'date',
					   'paged'                  => $paged
					);

					$articles = new WP_Query($args);

					// The Loop
					if ( $articles->have_posts() ) {
						while ( $articles->have_posts() ) : $articles->the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							 get_template_part( 'template-parts/content', 'index' );


						endwhile;
						wp_reset_postdata();

					} else {
						// no posts found
					}
					?>

		</div>
		</main><!-- #main -->
		<p class="more-posts"><button><a href="<?php edges_the_archives_link(); ?>"><?php _e('SEE MORE', 'edges'); ?></a></button></p>
	</div><!-- #primary -->

<?php
get_footer();
