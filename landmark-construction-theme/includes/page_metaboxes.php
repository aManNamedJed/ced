<?php
/*********************************/
/* Adds a box to the main column on the Post and Page edit screens. */
/**************************************/
function landmark_construction_theme_add_meta_box() {

	$screens = array( 'page', 'post', 'portfolio');

	foreach ( $screens as $screen ) {

		add_meta_box(
			'landmark_construction_theme_sectionid',
			__( 'Page Options', 'landmark-construction-theme' ),
			'landmark_construction_theme_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'landmark_construction_theme_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function landmark_construction_theme_meta_box_callback() {
  global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="bliccaThemespage_noncename" id="bliccaThemespage_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    wp_enqueue_script('wp-color-picker');
  	wp_enqueue_style( 'wp-color-picker' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	
	$landmark_construction_theme_page_subtitle = get_post_meta( $post->ID, '_landmark_construction_theme_page_subtitle', true );
	$landmark_construction_theme_page_color = get_post_meta( $post->ID, '_landmark_construction_theme_page_color', true );
 	$landmark_construction_theme_page_back = get_post_meta( $post->ID, '_landmark_construction_theme_page_back', true );
  	$landmark_construction_theme_page_caption = get_post_meta( $post->ID, '_landmark_construction_theme_page_caption', true);
  	$landmark_construction_theme_footer_style = get_post_meta ( $post->ID, '_footer_style', true);
  	$landmark_construction_theme_sidebar_column = get_post_meta ( $post->ID, '_sidebar_column', true);
  	$landmark_construction_theme_sidebar_style = get_post_meta ( $post->ID, '_sidebar_style', true);   
	echo '<label for="landmark_construction_theme_page_subtitle">';
	_e( 'Your Page Subtitle', 'landmark-construction-theme' );
	echo '</label><br>';
	echo '<input type="text" id="landmark_construction_theme_page_subtitle" name="_landmark_construction_theme_page_subtitle" value="' . esc_attr( $landmark_construction_theme_page_subtitle ) . '" size="60" /><br>';

	echo '<label for="landmark_construction_theme_page_color">';
	_e( 'Your Titles Color', 'landmark-construction-theme' );
	echo '</label><br>';
	echo '<input type="text" id="landmark_construction_theme_page_color" name="_landmark_construction_theme_page_color" value="' . esc_attr( $landmark_construction_theme_page_color ) . '" data-default-color="#ffffff" /><br>';
  
  	echo '<label for="landmark_construction_theme_page_back">';
	_e( 'If you dont set featured image, you can use background color', 'landmark-construction-theme' );
	echo '</label><br>';
	echo '<input type="text" id="landmark_construction_theme_page_back" name="_landmark_construction_theme_page_back" value="' . esc_attr( $landmark_construction_theme_page_back ) . '" data-default-color="#ffffff" /><br>';
  
  	echo '<label for="landmark_construction_theme_page_caption">';
	_e( 'Your Caption Height', 'landmark-construction-theme' );
	echo '</label><br>';
	echo '<input type="text" id="landmark_construction_theme_page_caption" name="_landmark_construction_theme_page_caption" value="' . esc_attr( $landmark_construction_theme_page_caption ) . '" size="60" placeholder="422" /><br>';
  
  	echo '<p>Footer Style:</p>'; ?> 
			<select name="_footer_style" id="_footer_style" class="widefat">
           <option value="no_footer" <?php selected( $landmark_construction_theme_footer_style, 'no_footer' ); ?>>Choose Footer</option>
			<?php
		     global $post;
		        $r = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'footers') );
		        if ($r->have_posts()) :
		        while ( $r->have_posts() ) : $r->the_post();
		        $footer_id = $post->ID;
  					?>
		        <option value="<?php echo esc_attr($footer_id); ?>" <?php selected( $landmark_construction_theme_footer_style, $footer_id ); ?>><?php the_title(); ?></option>
		        <?php 
		        endwhile; 
		        endif;
		        wp_reset_postdata(); 
			?>
      </select>
  <?php
  echo '<p>Sidebar Style:</p><p>Sidebar Style works with subpage template and blog template. Please change template from Page Attributes on the right side.</p>'; ?> 
			<select name="_sidebar_style" id="_sidebar_style" class="widefat">
           <option value="no_sidebar" <?php selected( $landmark_construction_theme_sidebar_style, 'no_sidebar' ); ?>>Choose Sidebar</option>
			<?php
		     global $post;
		        $r = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'sidebars') );
		        if ($r->have_posts()) :
		        while ( $r->have_posts() ) : $r->the_post();
		        $sidebar_id = $post->ID;
  					?>
		        <option value="<?php echo esc_attr($sidebar_id); ?>" <?php selected( $landmark_construction_theme_sidebar_style, $sidebar_id ); ?>><?php the_title(); ?></option>
		        <?php 
		        endwhile; 
		        endif;
		        wp_reset_postdata(); 
			?>
      </select> 
  <?php
  echo '<p>Sidebar Column:</p><p>If you did not choose sidebar style, your content will be fullwidth and your page does not have a sidebar.. </p>'; ?> 
			<select name="_sidebar_column" id="_sidebar_column" class="widefat">
           <option value="sidebar_4" <?php selected( $landmark_construction_theme_sidebar_column, 'sidebar_4' ); ?>>Sidebar 4 Column</option>
					 <option value="sidebar_3" <?php selected( $landmark_construction_theme_sidebar_column, 'sidebar_3' ); ?>>Sidebar 3 Column</option>
      </select> 
	<script type="text/javascript">
    jQuery(document).ready(function($) {   
        $('#landmark_construction_theme_page_color').wpColorPicker();
        $('#landmark_construction_theme_page_back').wpColorPicker();
    });             
  </script>
    <?php		
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function landmark_construction_theme_save_meta_box_data($post_id, $post) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	if ( isset($_POST['bliccaThemespage_noncename']) && !wp_verify_nonce( $_POST['bliccaThemespage_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	/* OK, it's safe for us to save the data now. */
	
	$page_set_array = array();
	// Make sure that it is set.
	
	if ( isset($_POST['_landmark_construction_theme_page_subtitle'])) {
	$page_set_array['_landmark_construction_theme_page_subtitle'] = $_POST['_landmark_construction_theme_page_subtitle'];}
  
  if ( isset($_POST['_landmark_construction_theme_page_color'])) {
	$page_set_array['_landmark_construction_theme_page_color'] = $_POST['_landmark_construction_theme_page_color'];}
  
	if ( isset($_POST['_landmark_construction_theme_page_back'])) {
	$page_set_array['_landmark_construction_theme_page_back'] = $_POST['_landmark_construction_theme_page_back'];}
  
  if ( isset($_POST['_landmark_construction_theme_page_caption'])) {
	$page_set_array['_landmark_construction_theme_page_caption'] = $_POST['_landmark_construction_theme_page_caption'];}
  
  if ( isset($_POST['_footer_style'])) {
	$page_set_array['_footer_style'] = $_POST['_footer_style'];}  

  
  if ( isset($_POST['_sidebar_column'])) {
  $page_set_array['_sidebar_column'] = $_POST['_sidebar_column'];}
  
  if ( isset($_POST['_sidebar_style'])) {
	$page_set_array['_sidebar_style'] = $_POST['_sidebar_style'];}   

  
	foreach ($page_set_array as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
add_action('save_post', 'landmark_construction_theme_save_meta_box_data', 1, 2); // save the custom fields