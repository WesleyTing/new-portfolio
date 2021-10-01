<?php
/**
 * The template for displaying all pages
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

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<div class="entry-content">

			<h1 class="screen-reader-text"><?php the_title(); ?></h1>

			<figure class="about-banner"><?php the_post_thumbnail('large'); ?></figure>

			<?php if ( function_exists('get_field')) : 
				if (get_field('artist_statement')) : ?>
			<section class="artist-statement">
			<div class="about-title"><h2 class="gold-underline">Artist Statement</h2></div>
				<?php the_field('artist_statement'); 
				endif; 
			endif; ?>
			</section>

			<?php if ( function_exists('get_field')) : 
				if (get_field('biography')) : ?>
			<section class="biography">
			<div class="about-biography"><h2 class="gold-underline">Biography</h2></div>
				<?php the_field('biography'); 
				endif;
			endif; ?>
			</section>

			<div class="cv">
			<?php
			$file = get_field('cv');
			if( $file ): ?>
				<div class="cv-cta"><a class="button-blue" href="<?php echo $file['url']; ?>" download target="_blank">DOWNLOAD CV</a></div>
			<?php endif; ?>
			</div>
			<?php
			endwhile; // End of the loop.
			?>
			</section>

			</div>

	</main><!-- #main -->

<?php
get_footer();
