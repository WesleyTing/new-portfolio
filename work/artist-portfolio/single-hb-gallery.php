<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Henri_Bowen
 */

get_header();
?>

	<main id="primary" class="site-main">
		<h1><?php the_title(); ?></h1>
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="YL0Wh2Sy"></script>
		<div class="grid">
		<div class="grid-sizer"></div>
		<?php
		while ( have_posts() ) :
			the_post();

			if (function_exists('have_rows')):
				if (have_rows('series_repeater')):
					while (have_rows('series_repeater')):
						the_row();
						$img = get_sub_field('work_image');
						$thSize = 'mason-thumbs';
						if( !empty( $img ) ): ?>
						<div class="grid-item div-mdl-img-<?php echo $img?>" >
							<?php echo wp_get_attachment_image($img, $thSize, false, array('class' => "fig-mdl-img-".$img, 'alt' => get_sub_field('work_caption'))) ?>
						</div>
						<?php endif;
					endwhile; ?> 
					
					<div class="modal-backdrop"></div>

					<?php while (have_rows('series_repeater')):
						the_row();
						$img = get_sub_field('work_image');
						$size = 'original';
						
						if( !empty( $img ) ): ?>
							<div class="modal-box-<?php echo $img?>" >
								<div class="modal-wrapper">
									<div class="modal-cls">
										<div class="cls">&#10006;</div>
									</div>
									<div class="modal-content">
										<figure>
											<?php echo wp_get_attachment_image($img, $size, false, array('loading' => 'lazy', 'class' => 'mdl-img-'.$img, 'alt' => get_sub_field('work_caption'))) ?>
											<figcaption class="modal-desc">
												<div class="modal-title-wrapper">
													<h3><?php echo esc_html(get_sub_field('work_title'))?></h3>
														<div class="modal-social-wrapper">
															<a class="a-tw-btn" title="Share on Twitter" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode('Check out this #art collection from Henri Bowen: ')?>&url=<?php echo esc_url(urlencode(the_permalink())) ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="tw-svg" d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
															<div class="div-fb-btn" data-href="<?php esc_url(the_permalink()) ?>" data-layout="button" data-size="large"><a class="a-fb-btn" title="Share on Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(urlencode(the_permalink())) ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="fb-svg" d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a></div>
														</div>
												</div>
												
												<p><?php echo esc_html(get_sub_field('work_description', false)) ?></p>
											</figcaption>
										</figure>
									</div>
								</div>
							</div>
						<?php endif;
					endwhile;
				endif;
			endif; ?>
		</div>
			<?php 


		endwhile;
		?>
		
	</main>

<?php
get_footer();
