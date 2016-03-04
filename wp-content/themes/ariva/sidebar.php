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
	<?php
		$page_id = 274;
		$page_object = get_page( $page_id );
		echo $page_object->post_content;
	?>
   	<?php dynamic_sidebar( 'primary' ); ?>
<?php endif;