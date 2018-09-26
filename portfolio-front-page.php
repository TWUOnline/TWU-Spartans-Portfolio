 <?php 
 
 /**
 * Template Name: TWU Portfolio Front Page
 *
 */
 
get_header(); ?>

<div class="content thin">		

	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
		<div <?php post_class( 'post single' ); ?>>
		
			<?php if ( has_post_thumbnail() ) : 
				
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail_size' ); 
				$thumb_url = $thumb['0']; 
				
				?>
		
				<div class="featured-media">
		
					<?php the_post_thumbnail( 'post-image' ); ?>
					
				</div><!-- .featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner">
												
				<div class="post-header">
																										
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
															
				</div><!-- .post-header section -->
				    
			    <div class="post-content">
			    
					<?php  the_content(); ?>

			    
			    </div>
			    
			    
	
			</div><!-- .post-inner -->
			
		
		</div><!-- .post -->
		
		<?php get_template_part( 'content', 'front-portfolio' ); ?>
		
	<?php endwhile; 

	else: ?>
	
		<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "fukasawa" ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
	
</div><!-- .content -->
								
<?php get_footer(); ?>