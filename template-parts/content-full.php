<?php
/**
 * Template part for
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EDGES
 */

?>

	<article id="post-<?php the_ID(); ?>" class="full-post">
		<a href="<?php the_permalink(); ?>"><img class="full-post-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
		<div class="full-post-text">
			<h1 class="full-post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<p class="full-post--excerpt"><?php echo get_the_excerpt(); ?></p>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
