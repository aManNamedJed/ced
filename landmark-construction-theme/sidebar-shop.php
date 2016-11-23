<aside class="shop-default-sidebar">
  <div class="sidebar-inner">
  <?php if ( is_active_sidebar( 'bliccathemes-sidebar-2' ) ) {  ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Shop Sidebar") ) : ?>
            <?php endif; ?> 
  <?php } ?>
  </div>
</aside>
