<?php
/**
 * Template part for displaying page content in page-contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="contact-header">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content contact-content">
		<?php
		the_content();
		?>
		<?php if(function_exists('get_field')) : ?>

			<div class="contact-info">
				<div class="address">
					<?php 
					if(get_field('studio_address')) : ?>
						<h2>Studio Address</h2>
						<p><?php the_field('studio_address', false, false); ?></p>
					<?php endif; ?>
				</div>
				
				<div class="phone">
					<?php if(get_field('phone')) : ?>
						<h2>Phone</h2>
						<p><?php the_field('phone'); ?></p>
					<?php endif; ?>
				</div>

				<div class="email">
					<?php if(get_field('email')) : ?>
						<h2>Email</h2>
						<p><?php the_field('email'); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php $location = get_field('studio_map');
			if( $location ): ?>
				<div class="acf-map" data-zoom="16">
					<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
				</div>
			<?php endif;

		endif; ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
