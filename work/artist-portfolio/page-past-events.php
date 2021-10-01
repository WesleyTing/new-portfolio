<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

get_header();
?>

	<main id="primary" class="site-main events-wrapper">
		<header class="page-header">
			<h1><?php the_title(); ?></h1>
		</header>

		<?php
		$p_args = array(
			'post_type' => 'hb-events',
			'orderby' => 'meta_value',
			'meta_key' => 'evt_end_date_and_time',
			'meta_value' => date("Y-m-d H:i:s"),
			'meta_type' => 'DATE',
			'meta_compare' => '<',
			'posts_per_page' => -1,
		);

		$query = new WP_Query ($p_args); ?>
			<section class="events-section">
			<?php while ( $query->have_posts() ) :
				$query->the_post(); 
					get_template_part( 'template-parts/content', 'hb-events' ); ?>
			<?php endwhile; ?> 
			</section>
		<a class="evt-page-link" href="<?php echo esc_url(get_permalink(23)) ?>"> Click here to view upcoming <?php echo strtolower(get_the_title(23)) ?> </a>
		<?php get_sidebar(); ?>
	</main><!-- #main -->

<?php

get_footer();
