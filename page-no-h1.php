<?php
/**
 * Template Name: Шаблон без загаловка H1
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mitroliti
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="main">
			<div class="page__wrap container">

				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
					}
				?>

				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page-noh1' );

					endwhile; // End of the loop.
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
