<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mitroliti
 */

?>

<article id="post-<?php the_ID(); ?>">

    <?php the_title( '<h1 class="entry-title hidden">', '</h1>' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->