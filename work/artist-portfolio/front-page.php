<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

get_header();
?>


		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<div class="entry-content">

			<h1 class="screen-reader-text"><?php the_title(); ?></h1>
			
			<section class="home-banner">

				<div class="banner-photo"><?php the_post_thumbnail('full-size'); ?></div>
			
				<figure class="banner-container">

				<figcaption class="headshot">
				<?php if ( function_exists('get_field')) :
				$image = get_field('headshot_photo');
				$size = 'medium';
				if( $image ) :
					echo wp_get_attachment_image( $image, $size );
					endif; 
				endif;?>


				<h2 class="artist-title">Henri Bowen</h2>

		
				<figcaption class="intro-message">
				<?php if ( function_exists('get_field')) : ?>
					<p><?php the_field('intro_message') ?></p>
					<br />
					<a class="cta-about button-blue" href="<?php the_permalink(19) ?>">READ MORE</a>
				</figcaption>
				<?php endif?>

				</figure>

			</section>

			<main id="primary" class="site-main">


			<?php if ( function_exists('get_field')) :
					if (get_field('featured_works')) : ?>
			<section class="featured-works">
					<h2 class="gold-underline">Featured Works</h2>
					<?php
					$featured_posts = get_field('featured_works');
					if( $featured_posts ): ?>
						<?php foreach( $featured_posts as $post ): 
							setup_postdata($post); ?>
							<div class="work-container"><div><a href="<?php the_permalink(); ?>"></div>
						<?php if( have_rows('series_repeater') ):
						while ( have_rows('series_repeater') ) : the_row();
							$image = get_sub_field('work_image');
							echo wp_get_attachment_image( $image, 'featured-works', false, 'class=work-image');
							?> 
							<h3>"<?php the_title(); ?>"</h3>
							</div>
							</a>
						<?php break; ?>
						<?php endwhile; 
					 	endif; 
					endforeach; ?>
					<div class="works-cta" ><a class="button-blue" href="<?php echo get_permalink(21) ?>">VIEW MORE WORKS</a><div>
					<?php wp_reset_postdata(); ?>
					<?php endif; 
					endif; 
				endif;
					?>

			</section> 

			<section class="latest-events">
			<h2 class="gold-underline">Latest Events</h2>

			<div class="events">

			<?php
				$p_args = array(
					'post_type' => 'hb-events',
					'orderby' => 'meta_value',
					'meta_key' => 'evt_end_date_and_time',
					'meta_value' => date("YmdHi"),
					'meta_compare' => '>',
					'posts_per_page' => 2,
				);
		
				$query = new WP_Query ($p_args);
					while ( $query->have_posts() ) :
						$query->the_post(); ?>
						<div class="event-container">
						<a href="<?php the_permalink() ?>">
						<?php 
						$image = get_field('evt_featured_image');
						$size = 'latest-event';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size, false, 'class=event-image' );
						}
						?>	
						<h3><?php the_title(); ?></h3> 
						</a>
						</div>

						<?php endwhile; // End of the loop.
			?>
			</div>
			<div class="events-cta"><a class="events-cta button-blue" href="<?php echo get_permalink(23) ?>">VIEW MORE EVENTS</a></div>
			</section>

			</div><!--End of Entry Content -->
		<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
