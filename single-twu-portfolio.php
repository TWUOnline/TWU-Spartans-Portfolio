<?php get_header('twu-portfolio'); ?>

<div class="content thin">
											        
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'single' ); ?>>
		
			<?php 
			
			$post_format = get_post_format(); 
			
			if ( $post_format == 'video' ) :
			
				if ( $pos = strpos( $post->post_content, '<!--more-->' ) ) : ?>
		
					<div class="featured-media">
					
						<?php
								
						// Fetch post content
						$content = get_post_field( 'post_content', get_the_ID() );
						
						// Get content parts
						$content_parts = get_extended( $content );
						
						// oEmbed part before <!--more--> tag
						$embed_code = wp_oembed_get($content_parts['main']); 
						
						echo $embed_code;
						
						?>
					
					</div><!-- .featured-media -->
				
				<?php endif;
				
			elseif ( $post_format == 'gallery' ) : ?>
			
				<div class="featured-media">	
	
					<?php fukasawa_flexslider( 'post-image' ); ?>
					
					<div class="clear"></div>
					
				</div><!-- .featured-media -->
							
			<?php elseif ( has_post_thumbnail() ) : ?>
					
				<div class="featured-media">
		
					<?php the_post_thumbnail( 'post-image' ); ?>
					
				</div><!-- .featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner">
				
				<div class="post-header">
													
					<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
															
				</div><!-- .post-header -->
				    
			    <div class="post-content">
			    
			    	<?php 
					if ( $post_format == 'video' ) { 
						$content = $content_parts['extended'];
						$content = apply_filters( 'the_content', $content );
						echo $content;
					} else {
						the_content();
					}
					?>
			    
			    </div><!-- .post-content -->
			    
			    <div class="clear"></div>
				
				<div class="post-meta-bottom">
				
					<ul>
						<li class="post-date">Published: <a href="<?php the_permalink(); ?>"><?php the_date( get_option( 'date_format' ) ); ?></a></li>

						<?php 
							$categories_list = get_the_term_list( get_the_ID(), 'twu-portfolio-type', '', esc_html__( ', ', 'fukasawa' ) );
							
							if ( $categories_list) { ?>
								<li class="post-categories"><?php _e( 'In: ', 'fukasawa' ); ?> <?php echo $categories_list; ?></li>
								
								
						<?php  
							}
							
							$tags_list = get_the_term_list( get_the_ID(), 'twu-portfolio-tag', '', esc_html__( ', ', 'fukasawa' ) );
							
							if ( $tags_list) { ?>
								<li class="post-tags"><?php _e( 'Tagged: ', 'fukasawa' ); ?> <?php echo $tags_list; ?></li>
								


						<?php }
						 edit_post_link( __( 'Edit post', 'fukasawa' ), '<li>', '</li>' ); ?>
					</ul>
					
					<div class="clear"></div>
					
				</div><!-- .post-meta-bottom -->
			
			</div><!-- .post-inner -->
			
			<div class="post-navigation">

				<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();

				if ( ! empty( $prev_post ) ) : ?>
				
					<a class="post-nav-prev" title="<?php printf( __( 'Previous artifact: %s', 'fukasawa' ), esc_attr( get_the_title( $prev_post ) ) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<p>&larr; <?php _e( 'Previous artifact', 'fukasawa' ); ?></p>
					</a>
				<?php endif;
				
				if ( ! empty( $next_post ) ) : ?>
					
					<a class="post-nav-next" title="<?php printf( __( 'Next artifact: %s', 'fukasawa' ), esc_attr( get_the_title( $next_post ) ) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">					
						<p><?php _e( 'Next artifact', 'fukasawa' ); ?> &rarr;</p>
					</a>
			
				<?php endif; ?>
				
				<div class="clear"></div>
			
			</div><!-- .post-navigation -->
								
			<?php comments_template( '', true ); ?>
		
		</div><!-- .post -->
									                        
	<?php endwhile; 

	else: ?>

		<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "fukasawa" ); ?></p>
	
	<?php endif; ?>    

</div><!-- .content -->
		
<?php get_footer(); ?>