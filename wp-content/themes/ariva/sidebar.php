<?php
	/**
	* sidebar.php
	* The main post loop in ARIVA
	* @author Vulinhpc
	* @package ARIVA
	* @since 1.0.0
	*/
?>
<?php if ( is_active_sidebar( 'primary' ) ) : ?>
   	<?php dynamic_sidebar( 'primary' ); ?>
<?php endif;