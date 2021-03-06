<?php get_header(); ?>

<?php PC_Hooks::pc_after_get_header(); /* Framework hook wrapper */ ?>

<div id="container" class="singular-post">

	<?php PC_Hooks::pc_after_container(); /* Framework hook wrapper */ ?>

	<div id="contentwrap" <?php echo PC_Utility::contentwrap_layout_classes(); ?>>

		<?php PC_Hooks::pc_before_content(); /* Framework hook wrapper */ ?>

		<div class="<?php echo PC_Utility::content_layout_classes_primary(); ?>">

			<?php PC_Hooks::pc_after_content_open(); /* Framework hook wrapper */ ?>

			<?php if ( have_posts() ) {
				while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'post singular-page' ); ?>>

						<div class="post-content">

							<h1 class="entry-title"><?php the_title(); ?></h1>

							<div class="post-meta">
								<?php PC_Hooks::pc_post_meta(); /* Framework hook wrapper */ ?>

								<?php $terms = PC_UTILITY::get_cpt_terms( 'slide_group', get_the_ID() ); ?>

								<p>
									<span class="author">By <?php the_author_posts_link(); ?></span><span class="post-date"> on <?php the_time( 'F jS, Y' ); ?></span><span class="categories"><?php if ( $terms ) {
											echo ' in ' . $terms;
										} ?></span> <?php the_tags( '<span class="tags">tags: ', ', ', '</span>' ); ?>

									<?php global $post; ?>
									<?php if ( 'open' == $post->comment_status ) : ?>
										<span class="comments">| <?php comments_popup_link( __( 'Leave a Comment', 'presscoders' ), __( '1 Comment', 'presscoders' ), __( '% Comments', 'presscoders' ), '', '' ); ?></span>
									<?php endif; ?>

								</p>
							</div>
							<!-- .post-meta -->

							<?php
							global $pc_global_column_layout;
							$layout_num = (int) substr( $pc_global_column_layout, 0, 1 );
							$arr = array( 'slider_content_full', 'slider_content_twothirds', 'slider_content_third' );
							$slider_thumb_size = $arr[$layout_num - 1];
							$image_attr = array( 'class' => 'featured-image post-image' );
							$image = PC_Utility::get_responsive_featured_image( get_the_id(), $slider_thumb_size, $image_attr );

							if ( ! empty( $image ) ) {
								echo $image;
							}
							the_content( '' );
							wp_link_pages( array( 'before' => '<div class="page-link">', 'after' => '</div>' ) );
							?>
						</div>
						<!-- post-content -->
					</div> <!-- post-item -->

					<?php comments_template( '', true ); ?>

				<?php endwhile;
			} // end of the loop.
			?>

		</div>
		<!-- .content -->

		<?php PC_Hooks::pc_after_content(); /* Framework hook wrapper */ ?>

	</div>
	<!-- #contentwrap -->

</div><!-- #container -->

<?php get_footer(); ?>
