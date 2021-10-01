<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php henri_bowen_post_thumbnail(); ?>

	<div class="entry-content events-content">
		<?php
		if (function_exists('get_field')):
			$img = get_field('evt_featured_image');
			$size = "event"; ?>
			<div class="evt-quick-view">
				<?php if ($img): ?>
				<div class="evt-img">
					<a href="<?php the_permalink() ?>">
					<?php echo wp_get_attachment_image($img, $size, false) ?>
				</div>
				<?php endif; ?>
				<div class="evt-info">
					<h2>
						<?php the_title() ?></a>
					</h2>
					<p>
						<?php //add more fields as needed.
							$content = get_field('evt_desc');
							$trimmed = wp_trim_words($content, 35, '... <br><a class="read-more" href="' . get_permalink() . '"> Read More </a>');
							echo $trimmed;
						?>
						
					</p>
				</div>
			</div>

			<?php			
		endif;	

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'henri-bowen' ),
				'after'  => '</div>',
			)
		);
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php henri_bowen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
