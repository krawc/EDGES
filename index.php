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

<!-- <div class="slick-arrows">
	<button class="slick-previous"><i class="ion ion-ios-arrow-left"></i></button>
	<button class="slick-next"><i class="ion ion-ios-arrow-right"></i></button>
</div> -->
</div>
<!-- the slider -->
		<main id="main" class="site-main">

			<h2 class="main-content--header">NEWS</h2>
			<div class="index-post--container">
			<?php
					// The Query
					$articles = new WP_Query(array('posts_per_page' => 6));

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
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();

			?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
