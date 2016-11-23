<?php 
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$social_style = landmark_construction_get_theme_options('social_widget_style', 'empty', 'false');
?>
<div class="header-social <?php echo esc_attr($social_style); ?>">
	<?php landmark_construction_theme_social_links(); ?>
	<div class="clearfix"></div>
</div>