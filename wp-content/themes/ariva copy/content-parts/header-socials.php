<?php global $ts_ariva; ?>
<div class="social-top">
	<ul class="social">
	<?php foreach ($ts_ariva['ts-social-list'] as $value): ?>
	  <li class="bounceIn animated"><a target="_blank" href="<?php echo esc_url( $value['url'] ); ?>"><i class="fa fa-<?php echo esc_attr($value['title']); ?>"></i></a></li>
	<?php endforeach ?>
	</ul>
</div>