<?php 
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$search_style = landmark_construction_get_theme_options('search_icon_style', 'search-classic', 'false');

?>
<div class="bliccaThemes-header-search <?php echo esc_attr($search_style); ?>">
    <div class="bliccaThemes-search-container">
    <i class="fa fa-search"></i>
    </div>
    <div class="search">
        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        	<input type="text" name="s" class="search-query" placeholder="<?php echo esc_attr_e('Search here...', 'landmark-construction-theme');?>" value="<?php esc_attr(the_search_query()); ?>">
        </form>
        <div class="search-close searchOffOn"><i class="fa fa-times"></i></div>
    </div>  
</div>