<?php
  
?>

	</div><!-- #main  -->

	<footer role="contentinfo">
			<div class="widget-area">
			<?php if ( is_active_sidebar( 'footer-widget-area' ) ){
				dynamic_sidebar( 'footer-widget-area' );					
			}?>
			</div>
		
			<div class="copyright">
				<small>&copy; Copyright <?php echo date('Y') . " " . esc_attr( get_bloginfo( 'name', 'display' ) ); ?> <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'themename' ); ?>"   ><?php printf( __( 'Proudly powered by %s.', 'themename' ), 'WordPress' ); ?></a></small>
			</div>
	</footer>
</div>


<?php wp_footer(); ?>

</body>
</html>