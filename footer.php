<?php wp_footer(); ?>
	<div class="footer row">
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'leftfooter' ); ?>
			</div>
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'middlefooter' ); ?>
			</div>
			<div class="col-md-3 col-md-offset-1 col-sm-4 info sidebar">
				<?php dynamic_sidebar( 'rightfooter' ); ?>
			</div>
	</div>	
	<div class="siteinfo row">
		<div class="col-xs-10 col-xs-offset-1">
		<p><?php printf( __( 'Copyright %1$s. Powered by <a href="%2$s">WordPress</a>.'), wp_dynamic_copyright(), 'http://www.wordpress.org/'); ?></p>
		<?php
			if (function_exists(bccl_get_license_image_hyperlink)) {
				printf( __( '<p>%1$s</p>'), bccl_get_license_image_hyperlink());
				
			}
		?>
		</div>
	</div>
</div> <!-- /footer -->
<?php wp_footer(); ?>
</body>
</html>
