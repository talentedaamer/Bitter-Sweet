<?php 
/**
 *
 *	SEARCH FORM
 *
 *	Theme search for to show on not found error and other pages.
 *
 */
 
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group has-info">
	      <input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'bitter-sweet' ); ?>">
	      <span class="input-group-btn">
	        <button class="btn btn-info submit" type="submit" name="submit" id="searchsubmit">
	        	<span class="glyphicon glyphicon-search"></span>
	        </button>
	      </span>
	</div><!-- /input-group -->
</form>