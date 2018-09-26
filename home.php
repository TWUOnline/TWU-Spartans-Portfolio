<?php get_header(); ?>

<div class="content">



		<?php

			if ( is_front_page() ) : ?>
				<div class="page-title">
			
					<div class="section-inner">

						<h4>Using This Theme</h4>
					</div><!-- .section-inner -->
		
				</div><!-- .page-title -->

				<div class="posts" id="posts">
					<p>Note: This theme is specifically designed to use a Page as the front of your portfolio. Create <a href="<?php echo admin_url( 'post-new.php?post_type=page' );?>">a new WordPress Page</a> to add whatever you want to say as an introduction to your portfolio. Be sure to use the template <strong>TWU Portfolio Front Page</strong>. If you want to have a blog in your portfolio, create another empty Wordpress Page named "Blog" or "News".</p>
						<p>Then in your Wordpress Settings, under <strong><a href="<?php echo admin_url( 'options-reading.php' );?>">Reading</a></strong>, set the option for <strong>Your homepage displays</strong> to be  <code>A static page (select below)</code>, and select the appropriate pages.</p>
		
						<img src="<?php echo get_stylesheet_directory_uri()?>/images/reading-settings.jpg" alt="reading settings" class="aligncenter" width="80%" />
		
						<p>If you are wanting Wordpress site for a different purpose, switch your theme to <strong>Fukasawa</strong>, which is the one this theme is based on.</p>
				</div>

			
			<?php else: // a posts display for a page set for blogs?>
																	                    
				<?php if ( have_posts() ) :
		
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$total_post_count = wp_count_posts();
					$published_post_count = $total_post_count->publish;
					$total_pages = ceil( $published_post_count / $posts_per_page );
		
					if ( 1 < $paged ) : ?>
		
						<div class="page-title">
			
							<h4><?php printf( __( 'Page %s of %s', 'fukasawa' ), $paged, $wp_query->max_num_pages ); ?></h4>
				
						</div><!-- .page-title -->
			
						<div class="clear"></div>
		
					<?php endif; ?>
	
					<div class="posts" id="posts">
				
						<?php 
						while ( have_posts() ) : the_post();
			
							get_template_part( 'content', get_post_format() );
				
						endwhile; 
			
					endif; ?>
		
				</div><!-- .posts -->
	
				<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		
					<div class="archive-nav">
				
						<?php echo get_next_posts_link( __( 'Older posts', 'fukasawa' ) . ' &rarr;' ); ?>
				
						<?php echo get_previous_posts_link( '&larr; ' . __( 'Newer posts', 'fukasawa' ) ); ?>
			
						<div class="clear"></div>
						
					</div><!-- .archive-nav -->
						
				<?php endif; ?>
		<?php endif ?>
		
</div><!-- .content -->
	              	        
<?php get_footer(); ?>