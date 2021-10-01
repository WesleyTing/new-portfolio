<?php
/**
 * The template for displaying the Links Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Henri_Bowen
 */

get_header();
?>

	<main id="primary" class="site-main links-wrapper">

		 
		<section class="links">
			<?php 
			$taxonomy = 'hb-links-category';
			$terms = get_terms(
					array(
						'taxonomy' => $taxonomy,
						'orderby' => 'ID',
					)
				); 
			if($terms && !is_wp_error($terms) ) :
				foreach($terms as $term) : 
					$term_arg = array(
						'post_type' => 'hb-links',
						'posts_per_page' => -1, 
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy,
								'field' => 'slug',
								'terms' => $term->slug,
					)
				),
			);  
					$query = new WP_Query( $term_arg );
					if($query->have_posts() ) : ?>
						<section class="links-section">
						<h2> <?php echo $term->name; ?> </h2>
						<span class="underline"></span>
						<?php echo category_description($term->term_id); ?>
						
						
						<div class="all-links">
							<?php while($query->have_posts() ) : 
								$query->the_post();
								
								if(function_exists('get_field')) :
									if(get_field('link_url')) : ?>
									<div class="single-link">
										<a href="<?php echo get_field('link_url'); ?>">

										<?php if(get_field('link_image')) :
										echo wp_get_attachment_image(get_field('link_image'), 'links-imgs');
										endif; ?>

										<h3><?php the_title(); ?></h3></a>
									<?php endif; 

									if(get_field('link_description')) : ?>
										<p class="link-desc"><?php the_field('link_description', false, false); ?></p>
									<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
						<?php wp_reset_postdata(); ?>
						</section>
					<?php endif; 
			    endforeach;		
			endif; ?>	
		</section>

	</main><!-- #main -->

<?php
get_footer();
