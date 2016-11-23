<?php 

landmark_construction_theme_get_defaults();
$boxed = landmark_construction_get_theme_options('boxed', '0', 'Yes');
?>
<footer class="footer_bliccaThemes">  
    <?php
    if ( !is_front_page() && is_home() ) {
    $id = get_option( 'page_for_posts' );
    }
    if ( function_exists('is_shop')) {
    if( is_shop() || is_product() ) {
      $id = get_option( 'woocommerce_shop_page_id' );
    }
	  }
    $footer_single_style = get_post_meta( $id, "_footer_style", true);
    if ( $footer_single_style != "no_footer" && $footer_single_style != "" ) {
      $the_query = new WP_Query( 'page_id='.$footer_single_style.'&post_type=footers' );
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
      ?><div class="container"><div class="row"><div class="col-md-12">  
      <?php the_content(); ?>
      </div></div></div>
      <?php 
      endwhile;
      wp_reset_postdata();
    }
    ?>       
</footer>
    <?php 
    if ( $boxed == 1 ) {
    ?></div><?php
    }
    ?> 
<div class="extra-menu-container"><div class="extra-menu-column">
<?php if ( is_active_sidebar( 'bliccathemes-extra-menu' ) ) {  ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("bliccaThemes-extra-menu") ) : ?>
            <?php endif; ?>
<?php } ?>
 <i class="extra-close fa fa-times"></i></div></div>  

</div>
    <?php wp_footer() ?>
  </body>
</html>
