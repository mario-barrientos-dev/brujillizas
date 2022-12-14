<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business-lander
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area no-sidebar">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					the_post_navigation( array(
						'prev_text' => esc_html( '&larr; %title' ),
						'next_text' => esc_html( '%title &rarr;' ),
					) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
