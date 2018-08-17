<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		
		?><div class="service-cards"><?php
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'orderby' => 'rand'
		);

		$result = new WP_Query( $query_args );

		if ( $result->have_posts() ) {
			while ( $result->have_posts() ) : $result->the_post();
			
				get_template_part( 'template-parts/content', 'page-cards-our-services' );
			
			endwhile;
			wp_reset_query();
		}
		?></div><?php

		$query_args = array(
			'post_type' => 'services',
			'posts_per_page' => -1,
			'orderby' => 'rand'
		);

		$result = new WP_Query( $query_args );

		if ( $result->have_posts() ) {
			while ( $result->have_posts() ) : $result->the_post();
			
				get_template_part( 'template-parts/content', 'page-our-services' );
			
			endwhile;
			wp_reset_query();
		}
		

		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>
