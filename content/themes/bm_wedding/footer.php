<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bruce & Meghan\'s Wedding
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bm_wedding' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bm_wedding' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'bm_wedding' ), 'Bruce &amp; Meghan\&#039;s Wedding', '<a href="http://www.bruceandmeghan.com" rel="designer">Bruce Bentley</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
