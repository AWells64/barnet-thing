<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_title(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<div class="service-content-top">

		<img src="<?php the_field('icon'); ?>" />

		<p><?php the_field('description'); ?></p>
		</div>
		<?php
		
		if( have_rows('pricing') ): ?>

			<table>
				<tr>
					<th>Job</th>
					<th>1 Hour</th>
					<th>2 Hours</th>
					<th>3-5 Hours</th>
					<th>5+ Hours</th>
				</tr>
			</table>
			
			<?php // loop through the rows of data
		    while ( have_rows('pricing') ) : the_row(); 
	   
			   // display a sub field value ?>
				<table>
					<tr>
						<td><?php the_sub_field('job'); ?></td>
						<td><?php the_sub_field('1_hour'); ?></td>
						<td><?php the_sub_field('2_hours'); ?></td>
						<td><?php the_sub_field('3-5_hours'); ?></td>
						<td><?php the_sub_field('5+_hours'); ?></td>
					</tr>
				</table>				
	   
		    <?php endwhile;
	   
	   else :
	   
		   // no rows found
	   
	   endif;


		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->
