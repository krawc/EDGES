<?php
/*
Template Name: All Posts - Archive
*/

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main ajax_posts">

			<h2 class="main-content--header">TODAY IN <?php echo get_bloginfo( 'name' ); ?></h2>
			<div class="index-post--container">
			<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args=array(
						 'post_type'              => 'post',
						 'posts_per_page'         => 9,
						 'orderby'                => 'date',
						 'paged' 									=> $paged
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
						?>
						<div class="pagination">
						    <?php
						        echo paginate_links( array(
						            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						            'total'        => $articles->max_num_pages,
						            'current'      => max( 1, get_query_var( 'paged' ) ),
						            'format'       => '?paged=%#%',
						            'show_all'     => false,
						            'type'         => 'plain',
						            'end_size'     => 2,
						            'mid_size'     => 1,
						            'prev_next'    => false,
						            'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'edges' ) ),
						            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'edges' ) ),
						            'add_args'     => false,
						            'add_fragment' => '',
						        ) );
						    ?>
						</div>
						<?php
					} else {
						// no posts found
					}
					?>

		</div>
		</main><!-- #main -->

	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
