<?php 
	global $ts_ariva;	
    $title_subscribe = $ts_ariva['ts-title-subscribe'];
    $phone_subscribe = $ts_ariva['ts-phone-subscribe'];
    $website_subscribe = $ts_ariva['ts-website-subscribe'];
?>
	<div class="ts-subscibe">
		<h3><?php echo apply_filters('the_title', $title_subscribe ); ?></h3>
		<form id="signup" action="" method="post">			
			<input name="email_subscribe" id="email_subscribe" type="text" placeholder="Your email here" value="" />	
			<input name="ts_submit" id="ts_submit_subscribe" type="submit" value="Send" />		
		</form>
		<div class="formmessage"></div>
	</div>	
	<div class="top-info">
			<span><?php echo esc_attr($phone_subscribe); ?></span>
			<span><a href="<?php echo esc_url($website_subscribe); ?>" target="_blank"><?php echo esc_attr($website_subscribe); ?></a></span>
	</div>