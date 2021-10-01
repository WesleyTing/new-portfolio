<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Henri_Bowen
 */

?>
	<hr class="hr-style">

	<footer id="colophon" class="site-footer">
		<section class="footer-contact-info">
			<p>Contact:</p>
				<?php
					if ( function_exists('get_field')) :
						if ( get_field('phone', 27) ) :  ?>
							<p class="footer-phone">
								<a href="tel:<?php the_field('phone', 27) ?>">	
								<?php the_field('phone', 27) ?>
							</a>	
							</p>
							<p class="footer-email">
								<a href="mailto:<?php the_field('email', 27) ?>">
								<?php the_field('email', 27) ?>	
							</a>
							</p>			
				<?php endif;
					endif;
				?>
				<p>Get in touch with me!</p>
			</section>

			<div class="middle-container">
			<div class="contact-cta"><a class="button-blue" href="<?php echo get_permalink(27) ?>">Contact Me</a></div>
				
			<nav id="social-navigation" class="social-navigation">
        		<?php wp_nav_menu( array( 'theme_location' => 'social') ); ?>
			</nav>
			
			</div>
				
		<div class="site-info">
			<p><?php esc_html_e( 'Created by:', 'hb' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://asham.bcitwebdeveloper.ca/', 'hb' ) ); ?>"><?php esc_html_e( 'Aaron Sham', 'hb' ); ?></a></p>
			<p><a href="<?php echo esc_url( __( 'http://ckang.bcitwebdeveloper.ca/', 'hb' ) ); ?>"><?php esc_html_e( 'Cassidy Kang', 'hb' ); ?></a></p>
			<p><a href="<?php echo esc_url( __( 'http://wting.bcitwebdeveloper.ca/', 'hb' ) ); ?>"><?php esc_html_e( 'Wesley Ting', 'hb' ); ?></a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
