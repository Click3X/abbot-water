<?php global $ts_ariva;?>
<ul class="social-footer">
<?php foreach ($ts_ariva['ts-social-list'] as $value): ?>
	<?php if ($value['url'] !=''): ?>
  		<li class="bounceIn animated"><a target="_blank" href="<?php echo esc_url($value['url']); ?>"><i class="fa fa-<?php echo esc_attr($value['title']); ?> "></i></a></li>
	<?php endif ?>
<?php endforeach ?>
</ul>