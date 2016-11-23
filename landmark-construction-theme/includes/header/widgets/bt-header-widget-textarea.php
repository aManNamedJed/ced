<?php if ( is_active_sidebar( 'bliccathemes-header-widget' ) ) {  ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("bliccaThemes-header-widget") ) : ?>
<?php endif; ?>
<?php } ?>