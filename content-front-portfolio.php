<?php
/**
 * The template for Front Page Portfolio section
 */


// Get number of projects to display (hardwired for now)
$portfolio_items_number = twu_spartans_front_artifact_count();


$args = array(
	'post_type'      => 'twu-portfolio',
	'posts_per_page' => $portfolio_items_number,
);

$project_query = new WP_Query ( $args );

?>

<?php if ( $project_query -> have_posts() ) : ?>

		<div class="page-title">
			
			<div class="section-inner">
				<p>&nbsp;</p>
				
				<h4><?php twu_spartans_front_artifact_title()?></h4>
				
				<div class="taxonomy-description">
					<?php twu_spartans_portfolio_tagline()?>
				</div>

			</div>
		</div>

		<div class="posts" id="posts">
		
			<?php
				while ( $project_query->have_posts() ) : $project_query->the_post();
					get_template_part( 'content', 'twu-portfolio' );
				endwhile;
			?>
			
			</div><!-- posts -->
			
			<?php
				if ($project_query->found_posts > $portfolio_items_number) {
					echo '<div class="clear"></div><p style="text-align:center"><a href="' . get_post_type_archive_link( 'twu-portfolio' ) . '">see all artifacts</a></p>';
						}

				wp_reset_postdata();
			?>
		


		
	</div><!-- .front-page-block.portfolio -->

<?php else : ?>

	<?php if ( current_user_can( 'publish_posts' ) ) : ?>

	<section class="no-results not-found">

		<div class="page-content">
			<h3 class="page-title"><?php _e( 'No Artifacts Found', 'argent' ); ?></h3>

			<p>
				<?php printf( esc_html__( 'This section will display your ' . $portfolio_items_number . ' latest artifactsl', 'argent' ) ); ?><br />
				<?php printf( wp_kses( __( 'Ready to publish your first artifact? <a href="%1$s">Get started here</a>.', 'argent' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=twu-portfolio' ) ) ); ?>
			</p>
		</div>

	</section><!-- .no-results.not-found -->

	<?php endif; ?>

<?php endif; ?>