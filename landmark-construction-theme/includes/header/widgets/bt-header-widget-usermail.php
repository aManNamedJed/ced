<?php
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$social_email = landmark_construction_get_theme_options('social_email', 'empty', 'false');

if ( !empty($social_email) ) {
?>
<div class="header-social-email">
<a href="mailto:<?php echo esc_html($social_email); ?>"><i class="fa fa-envelope-o"></i></a>
</div>
<?php
}