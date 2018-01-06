<?php
/**
 * Template part for
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EDGES
 */

?>

<article id="post-<?php the_ID(); ?>" class="index-post" style="background-image: url();">
	<a href="<?php the_permalink(); ?>">
			<img class="index-post-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>">
			<p class="index-post--category"><?php the_category(', '); ?></p>
			<h2 class="index-post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
