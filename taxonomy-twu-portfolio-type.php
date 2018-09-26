<?php get_header(); ?>

<div class="content">

	<div class="page-title">
			
		<div class="section-inner">

			<h4><?php
				$term_obj =	get_queried_object(); // the term we need for this taxonomy

				$term = get_term( $term_obj->term_id, 'twu-portfolio-type' );

				$tax_count = twu_portfolio_tax_count('twu-portfolio-type', $term->slug);

				$plural = ( $tax_count == 1) ? '' : 's';

				echo $tax_count . ' Artifact' . $plural . ' of Type "' . $term->name . '"';
			?>
			</h4>
			<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
			?>

			<?php
				
				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
				if ( 1 < $wp_query->max_num_pages ) : ?>
				
					<span><?php printf( __( 'Page %s of %s', 'fukasawa' ), $paged, $wp_query->max_num_pages ); ?></span>
					
					<div class="clear"></div>
				
				<?php endif; ?>
				
			</h4>
					
		</div><!-- .section-inner -->
		
	</div><!-- .page-title -->
	
	<?php if ( have_posts() ) : ?>
			
		<div class="posts" id="posts">
			
			<?php 
			while ( have_posts() ) : the_post();
						
				get_template_part( 'content', 'twu-portfolio' );
				
			endwhile; 
			?>
							
		</div><!-- .posts -->
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
			<div class="archive-nav">
			
				<div class="section-inner">
			
					<?php echo get_next_posts_link( '&laquo; ' . __( 'Older artifacts', 'fukasawa' ) ); ?>
							
					<?php echo get_previous_posts_link( __( 'Newer artifacts', 'fukasawa' ) . ' &raquo;' ); ?>
					
					<div class="clear"></div>
				
				</div>
				
			</div><!-- .post-nav archive-nav -->
			
					
		<?php endif; ?>

	<?php else:?>

		<?php get_template_part( 'content', 'none' );?>

				
	<?php endif; ?>

</div><!-- .content -->

<?php get_footer(); ?>