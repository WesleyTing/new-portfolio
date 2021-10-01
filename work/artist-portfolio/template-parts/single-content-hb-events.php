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


	<div class="entry-content single-evt-content">
		<h1 class='single-evt-header'>
			<?php the_title() ?>
		</h1>
		<?php
		if (function_exists('get_field')):
			$img = get_field('evt_featured_image');
			$size = "single-event"; ?>
			<div class="evt-view">
				<?php if ($img):?>
				<div class="single-evt-img">
					<?php echo wp_get_attachment_image($img, $size) ?>
				</div>
				<?php endif; ?>
				<div class="single-evt-info">
					<?php 
						$sd = DateTime::createFromFormat('Y-m-d H:i:s',get_field('evt_start_date_and_time'));
						$startDate = $sd->format('g:i A F d, Y');
						$ed = DateTime::createFromFormat('Y-m-d H:i:s',get_field('evt_end_date_and_time'));
						$endDate = $ed->format('g:i A F d, Y');
					?>

					<p class="single-evt-location">
						<strong>Location: </strong><?php the_field('evt_location') ?>
					</p>
					<div class="single-evt-dates">
						<p><strong>Starts: </strong><?php echo $startDate ?></p><p><strong> Ends: </strong><?php echo $endDate; ?></p>
						<?php if (get_field('evt_end_date_and_time') < date('Y-m-d H:i:s')): ?>
							<p><strong>This event has ended.</strong></p>							
						<?php endif; ?>
					</div>

					<p class="single-evt-desc">
						<?php the_field('evt_desc', false, false); ?>
					</p>
					<div class="single-evt-link">
						<a class="single-evt-btn" href="<?php the_field('evt_page_button') ?>">Official Event Page</a>
					</div>
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

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'henri-bowen' ),
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'henri-bowen' ),
			)
		);


		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php henri_bowen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
