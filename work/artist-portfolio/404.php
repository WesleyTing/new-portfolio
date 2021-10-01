<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Henri_Bowen
 */

get_header();
?>

	<main id="primary" class="site-main not-found">

		<section class="error-404 not-found">
			<header class="page-header">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hb-logo.png" alt="Henri Bowen Logo">
				<h2 class="error-header"><?php esc_html_e( 'Oops! That page does not exist.', 'henri-bowen' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">

				
				<p>Click <a href="https://henribowen.bcitwebdeveloper.ca/">here</a> to go back to the home page.</p>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
