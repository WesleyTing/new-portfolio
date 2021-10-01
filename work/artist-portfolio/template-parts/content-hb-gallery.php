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
	<div class="entry-content">
		<div class="series-quick-view">
			<a href=<?php the_permalink(); ?>>
				<div class="series-img-wrapper">
				<?php
				if (function_exists('have_rows')):
					if (have_rows('series_repeater')):
						$counter = 0;
						$tppage = 3;
						while (have_rows('series_repeater')):
							if ($counter < $tppage):
								$counter++;
								the_row();
								$img = get_sub_field('work_image');
								$size = 'series-thumbs';
								if( !empty( $img ) ): ?>
									<?php echo wp_get_attachment_image($img, $size, false, array('alt' => get_sub_field('work_caption'))) ?>
								<?php endif;
							else:
								break;
							endif;
						endwhile;
					endif; 
				endif; ?> 
			</div></a>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>	
	</div>

	<footer class="entry-footer">
		<?php henri_bowen_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
