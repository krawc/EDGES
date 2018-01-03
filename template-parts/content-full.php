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
		<img class="full-post-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>">
		<h1 class="full-post--title"><?php the_title(); ?></h1>
	</article><!-- #post-<?php the_ID(); ?> -->
