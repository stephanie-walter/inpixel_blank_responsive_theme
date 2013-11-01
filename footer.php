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
				<small> This theme is under <a href="http://wordpress.org/about/gpl/"> GPL V2 Licence </a> - <?php echo  esc_attr( get_bloginfo( 'name', 'display' ) ); ?>  - <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'themename' ); ?>"   ><?php printf( __( 'Proudly powered by %s.', 'themename' ), 'WordPress' ); ?></a></small>
			</div>
	</footer>
</div>

<?php wp_footer(); ?>
<!-- The mains scripts you'll need for your site  -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>




</body>
</html>