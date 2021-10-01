<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php
			$tax = 'hb-gallery-category';
			$terms = get_terms(
				array(
					'taxonomy' => $tax
				)
			);

			if ($terms && !is_wp_error($terms)):
				foreach ($terms as $term):
					$q_args = array(
						'post_type' => 'hb-gallery',
						'posts_per_page' => -1,
						'orderby' => 'ID',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => $tax,
								'field' => 'slug',
								'slug' => $term->slug,
								'terms' => $term->slug,
							)
						)						
					);
					$query = new WP_Query($q_args);
					if ($query->have_posts()): ?>
						<h1 class="gallery-tax-name"><?php echo $term->name ?></h1>
					<?php 
						while ($query->have_posts()): 
							$query->the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						wp_reset_postdata();
					endif;
				endforeach;
			endif;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>

<?php
get_footer();
