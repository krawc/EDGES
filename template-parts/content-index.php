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
			<img class="index-post-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>">
			<p class="index-post--category"><?php the_category(', '); ?></p>
			<h2 class="index-post--title"><?php the_title(); ?></h2>
</article><!-- #post-<?php the_ID(); ?> -->
