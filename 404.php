<?php get_header(); ?>

<div class="content">

	<div class="post single">
	
		<div class="post-inner section-inner thin">
		                
			<div class="post-header">
		
				<h1 class="post-title"><?php _e( 'Uh Oh, We Could Not Find What You Were Looking For', 'fukasawa' ); ?></h1>
													
			</div><!-- .post-header -->
	                                                	            
        <div class="post-content">
        	            
            <p><?php _e( 'Sorry, but we did not find any content at this location. Try starting again from the <a href=" ' . site_url() . '">home of this site</a> or the <a href="' . get_post_type_archive_link( 'twu-portfolio' ) . '">main portfolio index</a>. Please check the web address or try searching for what you were looking for?', 'fukasawa' ); ?></p>
            
            <?php get_search_form(); ?>
            
        </div><!-- .post-content -->
        	            	                        	
	</div><!-- .post -->
	
</div><!-- .content -->

<?php get_footer(); ?>
