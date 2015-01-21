<?php 
/**
 *
 *	FOOTER WIDGET AREAS FOR THE THEME
 *
 *	Theme footer widget areas. which shows on all post, pages.
 *
 */
 
?>
<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )|| is_active_sidebar( 'footer-4' )  ) : ?>
<div class="footer-widget-wrap">
	<div class="footer-widgets container">
		<div id="sidebar" class="widget-area col-md-2 col-sm-2">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- #sidebar -->

		<div id="sidebar" class="widget-area col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- #sidebar -->

		<div id="sidebar" class="widget-area col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- #sidebar -->

		<div id="sidebar" class="widget-area col-md-4 col-sm-4">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- #sidebar -->
	</div> <!-- .footer-widgets -->
</div> <!-- .footer-widget-wrap -->
<?php endif; ?>