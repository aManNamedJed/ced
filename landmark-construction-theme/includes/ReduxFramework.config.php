<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "landmark_construction_theme_options";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Landmark Theme Options', 'landmark-construction-theme' ),
        'page_title'           => __( 'Landmark Theme Options', 'landmark-construction-theme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );




    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'landmark-construction-theme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'landmark-construction-theme' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'landmark-construction-theme' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'landmark-construction-theme' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'landmark-construction-theme' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    Redux::setSection( $opt_name, array(
            'title' => 'General Settings',
            'id' => 'general_default',
            'icon' => 'el-icon-cog',
            'fields' => array (
                array (
                    'id' => 'favicon_upload',
                    'type' => 'media',
                    'desc' => 'Upload a 16px x 16px .png or .gif image that will be your favicon.',
                    'class' => 'ot-upload-attachment-id',
                    'title' => 'Favicon Upload',
                ),

                array (
                    'id' => 'disable_smooth_scroll',
                    'type' => 'checkbox',
                    'desc' => 'Check if you want to enable smooth scroll',
                    'title' => 'Enable Smooth Scroll',
                    'options' => array (
                        '1' => 'Yes',
                    ),
                    'default' => array(
                            '1' => 'No',
                    ),
                ),
                array (
                    'id' => 'boxed',
                    'type' => 'checkbox',
                    'desc' => 'Check if you want to use boxed design',
                    'title' => 'Enable Boxed Design',
                    'options' => array (
                        'Yes' => 'Yes',
                    ),
                ),
                array (
                    'id' => 'boxed_back',
                    'desc' => 'Background of body',
                    'type' => 'background',
                    'title' => 'Background of body',
                ),
                array (
                    'id' => 'error_page_id',
                    'type' => 'text',
                    'desc' => 'You need to write your page ID for 404 page content, you can find more information in tutorial for this',
                    'title' => '404 Page ID',
                ),

                array (
                    'id' => 'custom_css',
                    'type' => 'textarea',
                    'desc' => 'If you want to customize main.css, paste your css code here. When you update the Landmark, your custom css code does not disappear.',
                    'title' => 'Custom CSS',
                ),
        )
    ) );
            
    Redux::setSection( $opt_name, array(
            'title' => 'Header Settings',
            'id' => 'header_default',
            'icon' => 'el-icon-cog',
    ) );
    Redux::setSection( $opt_name, array(
            'title' => 'Header General Settings',
            'id' => 'headersettings_default',
            'subsection'=> true,
            'icon' => 'el-icon-cog',          
            'fields' => array(             
                array (
                    'id' => 'header_logo',
                    'type' => 'media',
                    'desc' => 'Upload your logo.',
                    'class' => 'ot-upload-attachment-id',
                    'title' => 'Header Logo',
                ),
                array (
                    'id' => 'header_logo_sticky',
                    'type' => 'media',
                    'desc' => 'Upload your logo for sticky header.',
                    'class' => 'ot-upload-attachment-id',
                    'title' => 'Sticky Header Logo',
                ),              
                array (
                    'id' => 'logo_text',
                    'type' => 'text',
                    'desc' => 'You can use text instead of logo',
                    'title' => 'Text Logo',
                ),
                array (
                    'id' => 'enable_minimal',
                    'type' => 'checkbox',
                    'desc' => 'If you check this, your menu will be change open/close menu and all setting below are useless.',
                    'title' => 'Enable Mini Menu',
                    
                    'options' => array (
                        '1' => 'Yes',
                    ),
                    'default' => array(
                        '1' => 'No',
                    ),
                ),              
                array (
                    'id' => 'enable_transparent',
                    'type' => 'checkbox',
                    'desc' => 'Check if you want to transparent fixed header on your web site',
                    'title' => 'Enable Transparent Fixed Header',
                    'options' => array (
                        '1' => 'Yes',
                    ),
                    'default' => array(
                            '1' => 'No',
                    ),
                ),
                array (
                    'id' => 'disable_sticky',
                    'type' => 'checkbox',
                    'desc' => 'Check if you want to enable sticky header',
                    'title' => 'Enable sticky header',
                    'options' => array (
                        '1' => 'Yes',
                    ),
                    'default' => array(
                        '1' => 'No',
                    ),
                ),                
                array (
                    'id' => 'enable_topsection',
                    'type' => 'checkbox',
                    'desc' => 'Check if you want to use top section',
                    'title' => 'Enable Top Section',
                    
                    'options' => array (
                        'Yes' => 'Yes',
                    ),
                    'default' => array(
                            'Yes' => 'No',
                    ),
                ),
       
                array (
                  'id' => 'header_layout',
                  'type' => 'select',
                  'desc' => 'Select your header layout',
                  'title' => 'Header Layout',
                  'default' => 'classic',
                  'options' => array (
                    'classic' => 'Classic Layout',
                    'navfull' => 'Logo on Left, Navigation on Bottom',
                    'navfull2' => 'Logo on Center, Navigation on Bottom',              
                  ),
                ),
               
                array (
                  'id' => 'topsection_layout',
                  'type' => 'select',
                  'desc' => 'Select your topsection layout',
                  'title' => 'Top Section Layout',
                  'default' => 'twocolumn',
                  'options' => array (
                    'twocolumn' => 'Two Column',
                    'centered' => 'One Column Centered',             
                  ),
                ),                                 
                array (
                  'id' => 'header_style',
                  'type' => 'select',
                  'desc' => 'Select your header link style from different options.',
                  'title' => 'Navigation Link Style',
                  'default' => 'header-style1',
                  'options' => array (
                    'header-style1' => 'Border bottom',
                    'header-style2' => 'Left Border',
                    'header-style3' => 'Rounded Background',
                    'header-style4' => 'Rounded Border',
                    'header-style5' => 'Square Background',
                    'header-style6' => 'Square Border',
                    'header-style7' => 'Full Height',
                    'header-style8' => 'Full Height Top Border',
                    'header-style9' => 'Full Height Bottom Border',
                    'header-style10' => 'Full Height Border',
                    'header-style11' => 'Only Links Colored', 
                    'header-style12' => 'Bordered Only Navigation', 
                  ),
                ),
                array (
                  'id' => 'bt_after_navigation',
                  'desc' => 'Click the checkbox that you want to add widgets after main navigation(right of your menu).',
                  'type'     => 'sorter',
                  'title' => 'Widget after Navigation',
                  'options' => array (
                    'enabled' => array(
                    ),
                    'disabled' => array(
                      'shopcart' => 'Shopping Cart Icon',
                      'search' => 'Search Icon',
                      'search2' => 'Search Form',
                      'login' => 'Log in Text',
                      'signup' => 'Signup and Login Button',
                      'signupicon'=> 'Icon Signup',
                      'usermail' => 'EMail Icon',
                      'socials' => 'Social Links',
                      'wpml' => 'WPML Dropdown',
                      'extra_menu' => 'Extra Menu',
                      'textarea' => 'Widgetised Area',
                    )
                  ),
                ),
        
                array (
                  'id' => 'bt_topsection_left',
                  'desc' => 'Click the checkbox that you want to add widgets left of your topsection. If you choose 1 column centered, use this area for adding widget',
                  'type'     => 'sorter',
                  'title' => 'Widget on Topsection left',
                  'options' => array (
                    'enabled' => array(
                    ),
                    'disabled' => array(
                      'shopcart' => 'Shopping Cart Icon',
                      'search' => 'Search Icon',
                      'search2' => 'Search Form',
                      'login' => 'Log in Text',
                      'signup' => 'Signup and Login Button',
                      'signupicon'=> 'Icon Signup',
                      'usermail' => 'EMail Icon',
                      'socials' => 'Social Links',
                      'wpml' => 'WPML Dropdown',
                      'textarea' => 'Widgetised Area',
                      'extra_menu' => 'Extra Menu'
                    )
                  ),
                ),
                array (
                  'id' => 'bt_topsection_right',
                  'desc' => 'Click the checkbox that you want to add widgets right of your topsection.',
                  'type'     => 'sorter',
                  'title' => 'Widget on Topsection right',
                  'options' => array (
                    'enabled' => array(
                    ),
                    'disabled' => array(
                      'shopcart' => 'Shopping Cart Icon',
                      'search' => 'Search Icon',
                      'search2' => 'Search Form',
                      'login' => 'Log in Text',
                      'signup' => 'Signup and Login Button',
                      'signupicon'=> 'Icon Signup',
                      'usermail' => 'EMail Icon',
                      'socials' => 'Social Links',
                      'wpml' => 'WPML Dropdown',
                      'textarea' => 'Widgetised Area',
                      'extra_menu' => 'Extra Menu'
                    )
                  ),
                ),
                array (
                  'id' => 'bt_logo_left',
                  'desc' => 'These only works with navigation on bottom header layouts.',
                  'type'     => 'sorter',
                  'title' => 'Widget on Logo left',
                  'options' => array (
                    'enabled' => array(
                    ),
                    'disabled' => array(
                      'shopcart' => 'Shopping Cart Icon',
                      'search' => 'Search Icon',
                      'search2' => 'Search Form',
                      'login' => 'Log in Text',
                      'signup' => 'Signup and Login Button',
                      'signupicon'=> 'Icon Signup',
                      'usermail' => 'EMail Icon',
                      'socials' => 'Social Links',
                      'wpml' => 'WPML Dropdown',
                      'textarea' => 'Widgetised Area',
                      'extra_menu' => 'Extra Menu'
                    )
                  ),
                ),
                array (
                  'id' => 'bt_logo_right',
                  'desc' => 'These only works with navigation on bottom header layouts.',
                  'type'     => 'sorter',
                  'title' => 'Widget on Logo right',
                  'options' => array (
                    'enabled' => array(
                    ),
                    'disabled' => array(
                      'shopcart' => 'Shopping Cart Icon',
                      'search' => 'Search Icon',
                      'search2' => 'Search Form',
                      'login' => 'Log in Text',
                      'signup' => 'Signup and Login Button',
                      'signupicon'=> 'Icon Signup',
                      'usermail' => 'EMail Icon',
                      'socials' => 'Social Links',
                      'wpml' => 'WPML Dropdown',
                      'textarea' => 'Widgetised Area',
                      'extra_menu' => 'Extra Menu'
                    )
                  ),
                ),
            )
    ));
    Redux::setSection( $opt_name, array(
            'title' => 'Header Customisation',
            'id' => 'headercustomisation_default',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(             
                array(
                    'id'        => 'headerbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Header Background',
                    'desc'      => 'This your header background, including top section, navbar, navigation and padding..',
                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                    'default'   => array(
                        'color'     => '',
                        'alpha'     => 1
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'        => 'stickybg',
                    'type'      => 'color_rgba',
                    'title'     => 'Sticky Header Background',
                    'desc'      => 'This your header sticky header background, including top section, navbar, navigation and padding..',
                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                    'default'   => array(
                        'color'     => '',
                        'alpha'     => 1
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),              
                array(
                    'id'        => 'navbarbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Navbar Background',
                    'desc'      => 'This your header navbar background, container of logo and navigation area',
                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                    'default'   => array(
                        'color'     => '',
                        'alpha'     => 0
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'        => 'navbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Navigation Background',
                    'desc'      => 'This your header navigation background, container navigation area',
                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                    'default'   => array(
                        'color'     => '',
                        'alpha'     => 0
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'        => 'navfullbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Navigation Row Background for non-classic Layout',
                    'desc'      => 'This your header navigation background, container navigation area. This is for non-classic layout.',
                    'default'   => array(
                        'color'     => '',
                        'alpha'     => 0
                    ),                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),

                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),              
                array( 
                    'id'       => 'header-border',
                    'type'     => 'border',
                    'title'    => 'Header Border',
                    'output'   => array('.bliccaThemes-header '),
                    'desc'     => 'This is your header border color options',
                    'default'  => array(
                        'border-color'  => '', 
                        'border-style'  => 'solid', 
                        'border-top'    => '', 
                        'border-right'  => '', 
                        'border-bottom' => '', 
                        'border-left'   => ''
                    )
                ),
                array (
                'id' => 'btnavbar-border',
                'type' => 'color',
                'title' => 'Navbar Seperator Border Color',
                'desc'  => 'This your header navbar border, container logo and navigation area',
                ),
                array (
                'id' => 'btnav-border',
                'type' => 'color',
                'title' => 'Nav Separator Border Color',
                'desc'     => 'This your header navigation border, container navigation area',
                ),
                array(
                    'id'       => 'nav-link-color',
                    'type'     => 'link_color',
                    'title'    => 'Navigation Links Color',
                    'desc'     => 'Change your navigation links color',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),
                array(
                    'id'       => 'sticky-nav-link-color',
                    'type'     => 'link_color',
                    'title'    => 'Sticky Navigation Links Color',
                    'desc'     => 'Change your navigation links color',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),              
                array (
                'id' => 'nav-link-bg',
                'type' => 'color',
                'title' => 'Link background',
                'desc'     => 'Change your navigation links color, choosing appropriately navigation link style will be help you to customise your header. For Example, use a navigation style with background',
                ),
                array (
                'id' => 'nav-link-bg-hover',
                'type' => 'color',
                'title' => 'Link background on hover',
                'desc'     => 'Change your navigation links color, choosing appropriately navigation link style will be help you to customise your header. For Example, use a navigation style with background',
                ),              
                array (
                'id' => 'nav-link-border',
                'type' => 'color',
                'title' => 'Link border',
                'desc'     => 'Change your navigation border color, choosing appropriately navigation link style will be help you to customise your header. For Example, use a navigation style with border',
                ),
                array(
                'id' => 'nav-link-border-active',
                'type' => 'color',
                'title' => 'Link border on active',
                'desc'     => 'Change your navigation border color, choosing appropriately navigation link style will be help you to customise your header. For Example, use a navigation style with border',
                ),              
                array(
                'id' => 'nav-link-border-hover',
                'type' => 'color',
                'title' => 'Link border on hover',
                'desc'     => 'Change your navigation border color, choosing appropriately navigation link style will be help you to customise your header. For Example, use a navigation style with border',
                ),
                array (
                'id' => 'menu-icon-link-color',
                'type' => 'color',
                'title' => 'Icon Color on Menu Item Label',
                'desc'     => 'If you use icon on your menu item label, you can set your color with changing this.',
                ),
                array (
                    'id' => 'menu-icon-margin',
                    'type' => 'text',
                    'desc' => 'You can add/change margin of icon on menu item label. Just write number, dont add px etc. Leave blank for default value.',
                    'title' => 'Icon Margin one Menu Item Label',
                ),
                array(
                    'id'        => 'responsive_menu_bg',
                    'type'      => 'color_rgba',
                    'title'     => 'Mobile Menu Background',
                    'desc'      => '',
                    'default'   => array(
                        'color'     => '#fff',
                        'alpha'     => 1
                    ),                
                    // See Notes below about these lines.
                    'output'    => array('background-color' => '.responsive-menu'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'       => 'mobile-first-link',
                    'type'     => 'link_color',
                    'title'    => 'Mobile Links Top Items',
                    'desc'     => 'Change your navigation links color',
                    'output'    => array('.responsive-menu-container .mobile-navigation>li>a'),
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),              
                array(
                    'id'       => 'mobile-sub-link',
                    'type'     => 'link_color',
                    'title'    => 'Mobile Links Sub Items',
                    'desc'     => 'Change your navigation links color',
                    'output'    => array('.responsive-menu-container .sub-menu a'),
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),              
            )
    ));  
    Redux::setSection( $opt_name, array(
            'title' => 'TopSection Customisation',
            'id' => 'topsection_default',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(
                array (
                    'id' => 'top_section_height',
                    'type' => 'text',
                    'desc' => 'Write a number for topsection height, we need this for vertical center',
                    'title' => 'Top Section Height',
                ),
                array(
                    'id'        => 'topsectionbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Top Section Background',
                    'desc'      => 'This your topsection background',
                 
                    // See Notes below about these lines.
                    //'output'    => array('background-color' => '.site-header'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),

                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'        => 'topsectionborderbg',
                    'type'      => 'color_rgba',
                    'title'     => 'Top Section Border Color',
                    'desc'      => 'This your topsection border',
                 
                    // See Notes below about these lines.
                    'output'    => array('border-color' => '.topsection'),
                    //'compiler'  => array('color' => '.site-header, .site-footer', 'background-color' => '.nav-bar'),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),              
                array (
                'id' => 'topsectiontextcolor',
                'type' => 'color',
                'title' => 'Top Section Text Color',
                'desc'     => '',
                'output'    => array('color' => '.topsection .header-text-widget'),              
                ),
                array (
                'id' => 'topsectioniconcolor',
                'type' => 'color',
                'title' => 'Top Section Icon Color',
                'desc'     => '',
                'output'    => array('color' => '.topsection .header-text-widget i'),              
 
                ),
                array(
                    'id'       => 'topsectionlinkcolor',
                    'type'     => 'link_color',
                    'title'    => 'Top Links Color',
                    'desc'     => '',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    ),
                    'output'    => array('color' => '.topsection .header-text-widget a'),
                ),                

            )
    ));
    Redux::setSection( $opt_name, array(
            'title' => 'Social Widget Customisation',
            'id' => 'socialwidget_default',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(                                   
                array (
                  'id' => 'social_widget_style',
                  'type' => 'select',
                  'desc' => 'Select your social widget style',
                  'title' => 'Social Widget',
                  'default' => 'rounded-bg',
                  'options' => array (
                    'rounded-bg' => 'Rounded',
                    'square-bg' => 'Square',
                    'social-color' => 'Social Brand Color',
                    'text-social' => 'Text Icon',
                  ),
                ),
                array (
                    'id' => 'social_widget_size',
                    'type' => 'text',
                    'desc' => 'Write a font-size for your social widget, dont add px etc. Just write a number.',
                    'title' => 'Social Widget Font Size',
                ),              
                array (
                    'id' => 'social_widget_height',
                    'type' => 'text',
                    'desc' => 'Write a height for your social widget, dont add px etc. Just write a number.',
                    'title' => 'Social Widget Height',
                ),
                array (
                    'id' => 'social_widget_width',
                    'type' => 'text',
                    'desc' => 'Write a width for your social widget, dont add px etc. Just write a number.',
                    'title' => 'Social Widget Width',
                ),              
                array(
                    'id'       => 'social_widget_link_color',
                    'type'     => 'link_color',
                    'title'    => 'Social Widget Icon Color',
                    'desc'     => '',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),                
                array (
                'id' => 'social_widget_background',
                'type' => 'color',
                'title' => 'Social Widget Background',
                'desc' => 'Use this option with Rounded or Square social widget style',
                ),
                array (
                'id' => 'social_widget_background_hover',
                'type' => 'color',
                'title' => 'Social Widget Background on Hover',
                'desc' => 'Use this option with Rounded or Square social widget style',
                ),

                array (
                'id' => 'social_widget_border_color',
                'type' => 'color',
                'title' => 'Border Color',
                'desc'     => 'Use this option with Rounded or Square social widget style',
                ),
                array (
                'id' => 'social_widget_border_color_hover',
                'type' => 'color',
                'title' => 'Border Color on Hover',
                'desc'     => 'Use this option with Rounded or Square social widget style',
                ),                                
        )
    ) );

    Redux::setSection( $opt_name, array(
            'title' => 'Dropdown Customisation',
            'id' => 'dropdown_default',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(                                   
                array(
                    'id'       => 'dropdown_link_color',
                    'type'     => 'link_color',
                    'title'    => 'Dropdown Link Color',
                    'desc'     => '',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),
                array (
                'id' => 'dropdown_link_bg',
                'type' => 'color',
                'title' => 'Dropdown Background',
                'desc' => 'Change Dropdown Background',
                ),
                array (
                'id' => 'dropdown_link_bg_hover',
                'type' => 'color',
                'title' => 'Dropdown Link Background on Hover',
                'desc' => 'Change The Dropdown Background on Hover',
                ),

                array (
                'id' => 'dropdown_border_color',
                'type' => 'color',
                'title' => 'Dropdown Border Color',
                ),
                array (
                'id' => 'dropdown_top_border_color',
                'type' => 'color',
                'title' => 'Dropdown Top Border Color',
                ),
                array (
                'id' => 'dropdown_icon_color',
                'type' => 'color',
                'title' => 'Dropdown Icon Color on Menu Item Label',
                ),
        )
    ) );
    Redux::setSection( $opt_name, array(
            'title' => 'Mega Menu Customisation',
            'id' => 'mega_menu_default',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(                                   
                array (
                  'id' => 'mega_menu_style',
                  'type' => 'select',
                  'desc' => 'Select your mega menu style',
                  'title' => 'Mega Menu Style',
                  'default' => 'rounded-bg',
                  'options' => array (
                    'rounded-bg' => 'Style Light',
                    'square-bg' => 'Style Dark',
                    'social-color' => 'Style Icon',
                  ),
                ),

                array(
                    'id'       => 'mega_menu_link_color',
                    'type'     => 'link_color',
                    'title'    => 'Mega Menu Link Color',
                    'desc'     => '',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),
                array (
                'id' => 'mega_menu_link_bg',
                'type' => 'color',
                'title' => 'Mega Menu Link Background',
                'desc' => 'Change The Mega Menu Link Background',
                ),
                array (
                'id' => 'mega_menu_link_bg_hover',
                'type' => 'color',
                'title' => 'Mega Menu Link Background on Hover',
                'desc' => 'Change The Mega Menu Link Background on Hover',
                ),
                array (
                'id' => 'mega_title_color',
                'type' => 'color',
                'title' => 'Mega Menu Title Color',
                'desc' => 'Change The Mega Menu Title Color',
                ),
                array (
                'id' => 'mega_title_bg',
                'type' => 'color',
                'title' => 'Mega Menu Title Background',
                'desc' => 'Change The Mega Menu Title Background',
                ),

                array (
                'id' => 'mega_menu_border_color',
                'type' => 'color',
                'title' => 'Mega Menu Border Color',
                ),

                array (
                'id' => 'mega_menu_icon_color',
                'type' => 'color',
                'title' => 'Mega Menu Icon Color on Menu Item Label',
                ),
        )
    ) );

    Redux::setSection( $opt_name, array(
            'title' => 'Other Customisation',
            'id' => 'other_customisation',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(                                   
                array (
                  'id' => 'search_icon_style',
                  'type' => 'select',
                  'desc' => 'Select your search icon style',
                  'title' => 'Search Icon Style',
                  'default' => 'search-classic',
                  'options' => array (
                    'search-circle-bg' => 'Circle',
                    'search-rounded-bg' => 'Rounded Square',
                    'search-square-bg' => 'Square',
                    'search-classic' => 'Just Icon',
                  ),
                ),

                array(
                    'id'       => 'search_icon_color',
                    'type'     => 'link_color',
                    'title'    => 'Search Icon Color',
                    'desc'     => '',
                    'default'  => array(
                        'regular'  => '', 
                        'hover'    => '', 
                        'active'   => '',  
                        'visited'  => '', 
                    )
                ),
                array (
                'id' => 'search_icon_background',
                'type' => 'color',
                'title' => 'Background of Search Icon',
                'desc' => 'working with circle and square styles.',
                ),
                array (
                'id' => 'search_icon_background_hover',
                'type' => 'color',
                'title' => 'Background of Search Icon on Hover',
                'desc' => 'working with circle and square styles.',
                ),
                array (
                'id' => 'search_icon_border',
                'type' => 'color',
                'title' => 'Border Color of Search Icon',
                'desc' => 'working with circle and square styles.',
                ),
                array (
                'id' => 'search_icon_border_on_hover',
                'type' => 'color',
                'title' => 'Border Color of Search Icon on Hover',
                'desc' => 'working with circle and square styles.',
                ),

                array (
                'id' => 'search_icon_font_size',
                'type' => 'text',
                'desc' => 'Write a number for search icon font-size for Style Icon, dont add px, em etc. Leave it blank for default value',
                'title' => 'Font Size of Search Icon',
                ),
                array (
                    'id' => 'search_icon_width',
                    'type' => 'text',
                    'desc' => 'Write a number for your search widget width',
                    'title' => 'Circle Search Widget Width',
                ),  
                array (
                    'id' => 'search_icon_height',
                    'type' => 'text',
                    'desc' => 'Write a number for your search widget height',
                    'title' => 'Circle Search Widget Height',
                ),              
                array (
                  'id' => 'cart_content',
                  'type' => 'select',
                  'desc' => 'Select your shopping cart icon style',
                  'title' => 'Cart Widget',
                  'default' => 'icon',
                  'options' => array (
                    'icon' => 'Icon',
                    'icon_text' => 'Icon + Text',
                    'icon_text_total' => 'Icon + Text + Total',
                    'icon_count' => 'Icon + Count',
                    'icon_count_two' => 'Icon + Count (2)',
                    'icon_text_count' => 'Icon + Text + Count'
                  ),
                ), 
                array (
                  'id' => 'cart_background_style',
                  'type' => 'select',
                  'desc' => 'Select your shopping cart background style',
                  'title' => 'Cart Widget Background',
                  'default' => 'cart-1',
                  'options' => array (
                    'cart-1' => 'No Style',
                    'cart-2' => 'Square',
                    'cart-3' => 'Circle'
                  ),
                ),
                array (
                    'id' => 'cart_text',
                    'type' => 'text',
                    'desc' => 'Write a string for your cart text, default is Cart',
                    'title' => 'Cart Text',
                ),                                                 
                array(
                    'id'        => 'cart_icon_background',
                    'type'      => 'color_rgba',
                    'title'     => 'Cart Icon Background',
                    'desc'      => 'This your cart icon background',                 
                    'output'    => array('background-color' => '.bt-cart-header'),

                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
              
                array(
                    'id'        => 'cart_icon_background_hover',
                    'type'      => 'color_rgba',
                    'title'     => 'Cart Icon Background on Hover',
                    'desc'      => 'This your cart icon background on hover',                 
                    'output'    => array('background-color' => '.bt-cart-header:hover'),
                    'default'   => array(
                        'color'     => '#fff',
                        'alpha'     => 0
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),
                array(
                    'id'        => 'cart_icon_border_color',
                    'type'      => 'color',
                    'title'     => 'Cart Icon Border Color',                   
                    'output'    => array('border-color' => '.bt-cart-header')
                ),
                array(
                    'id'        => 'cart_icon_border_color_hover',
                    'type'      => 'color',
                    'title'     => 'Cart Icon Border Color on Hover',                   
                    'output'    => array('border-color' => '.bt-cart-header:hover')
                ),
                array(
                    'id'        => 'cart_icon_color',
                    'type'      => 'color',
                    'title'     => 'Cart Icon and Text Color',                   
                    'output'    => array('color' => '.bt-cart-header a')
                ),
                array(
                    'id'        => 'cart_icon_color_hover',
                    'type'      => 'color',
                    'title'     => 'Cart Icon and Text Color on Hover',                   
                    'output'    => array('color' => '.bt-cart-header:hover a')
                ),
              
                array (
                    'id' => 'cart_text_font_size',
                    'type' => 'text',
                    'desc' => 'Write a number for your cart text font-size, default is 14',
                    'title' => 'Cart Font Size',
                ), 
                array (
                    'id' => 'cart_text_width',
                    'type' => 'text',
                    'desc' => 'Write a number for your cart widget width',
                    'title' => 'Cart Widget Width',
                ),  
                array (
                    'id' => 'cart_text_height',
                    'type' => 'text',
                    'desc' => 'Write a number for your cart widget height',
                    'title' => 'Cart Widget Height',
                ),
                array (
                  'id' => 'search_form_style',
                  'type' => 'select',
                  'desc' => 'Search Form Widget style',
                  'title' => 'Search Form Widget style',
                  'default' => 'search-form-widget-1',
                  'options' => array (
                    'search-form-widget-1' => 'Big Rectangle',
                    'search-form-widget-2' => 'Mini Rectangle',
                    'search-form-widget-3' => 'Big Rounded',
                    'search-form-widget-4' => 'Mini Rounded',
                  ),
                ),
                array(
                    'id'        => 'header_search_form_bg',
                    'type'      => 'color_rgba',
                    'title'     => 'Search Form Widget Background',                 
                    'output'    => array('background-color' => '.bliccaThemes-header-search-2 input'),
                    'default'   => array(
                        'color'     => '#fff',
                        'alpha'     => 0
                    ),
                 
                    // These options display a fully functional color palette.  Omit this argument
                    // for the minimal color picker, and change as desired.
                    'options'       => array(
                        'show_input'                => true,
                        'show_initial'              => true,
                        'show_alpha'                => true,
                        'show_palette'              => true,
                        'show_palette_only'         => false,
                        'show_selection_palette'    => true,
                        'max_palette_size'          => 10,
                        'allow_empty'               => true,
                        'clickout_fires_change'     => false,
                        'choose_text'               => 'Choose',
                        'cancel_text'               => 'Cancel',
                        'show_buttons'              => true,
                        'use_extended_classes'      => true,
                        'palette'                   => null,  // show default
                        'input_text'                => 'Select Color'
                    ),                        
                ),

                array(
                    'id'        => 'search_form_border',
                    'type'      => 'color',
                    'title'     => 'Search Form Border Color',                   
                    'output'    => array('border-color' => '.bliccaThemes-header-search-2 input')
                ),     
                array(
                    'id'        => 'search_form_text',
                    'type'      => 'color',
                    'title'     => 'Search Form Text Color',                   
                    'output'    => array('color' => '.bliccaThemes-header-search-2 input, .bliccaThemes-header-search-2 i, .bliccaThemes-header-search-2 input::-webkit-input-placeholder, .bliccaThemes-header-search-2 input:-moz-placeholder, .bliccaThemes-header-search-2 input::-moz-placeholder, .bliccaThemes-header-search-2 input:-ms-input-placeholder')
                ),                                                            
        )
    ) );

    Redux::setSection( $opt_name, array(
            'title' => 'Caption Customisation',
            'id' => 'caption_defaults',
            'subsection' => true,
            'icon' => 'el-icon-cog',
            'fields' => array(   

                array (
                  'id' => 'landmark_construction_theme_caption_style',
                  'type' => 'select',
                  'desc' => 'Choose a style for your caption for subpage',
                  'title' => 'Caption Style',
                  'default' => 'header-style1',
                  'options' => array (
                    'caption-style1' => 'Style 1',
                    'caption-style2' => 'Style 2',
                    'caption-style3' => 'Style 3',               
                  ),
                ),
                array(         
                    'id'       => 'caption-default-background',
                    'type'     => 'background',
                    'title'    => __('Caption Background', 'landmark-construction-theme'),
                    'subtitle' => __('Caption background with image, color, etc.', 'landmark-construction-theme'),
                    'desc'     => __('You may want to change your caption setting with 1 option instead of setting one by one...', 'landmark-construction-theme'),
                    'output'      => array('.caption'),
                ),                
                array(
                    'id'          => 'caption-typo',
                    'type'        => 'typography', 
                    'title'       => "Caption Title Fonts",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.caption h2, .caption h1'),
                    'units'       =>'px',
                   
                ),                                             
                array(
                    'id'          => 'caption-typo2',
                    'type'        => 'typography', 
                    'title'       => "Caption Description Fonts",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.caption p'),
                    'units'       =>'px',
                   
                ), 

                array (
                    'id' => 'caption_height',
                    'type' => 'text',
                    'desc' => 'Write a number for your caption height',
                    'title' => 'Caption Height',
                ),


        )
    ) );
    Redux::setSection( $opt_name, array(
            'title' => 'Social Settings',
            'id' => 'social_default',
            'icon' => 'el-icon-cog',
            'fields' => array (
                array (
                    'id' => 'twitter_user_name',
                    'type' => 'text',
                    'desc' => 'Twitter User Name that you want show latest tweet',
                    'title' => 'Twitter User Name',
                ),
                array (
                    'id' => 'consumer_key',
                    'type' => 'text',
                    'desc' => 'Your Twitter Consumer Key',
                    'title' => 'Twitter Consumer Key',
                ),
                array (
                    'id' => 'consumer_secret',
                    'type' => 'text',
                    'desc' => 'Your Twitter Consumer Secret',
                    'title' => 'Twitter Consumer Secret',
                ),
                array (
                    'id' => 'access_token',
                    'type' => 'text',
                    'desc' => 'Your Twitter Access Token',
                    'title' => 'Twitter Access Token',
                ),
                array (
                    'id' => 'access_token_secret',
                    'type' => 'text',
                    'desc' => 'Your Twitter Access Token Secret',
                    'title' => 'Twitter Access Token Secret',
                ),
                array (
                    'id' => 'your_social_network',
                    'type' => 'info',
                    'desc' => '<p>Paste the full url you\'d like the image to link</p>',
                    'title' => 'Your Social Network',
                ),
                array (
                    'id' => 'social_email',
                    'type' => 'text',
                    'desc' => 'Write your email',
                    'title' => 'E-Mail',
                ),
                array (
                    'id' => 'social_facebook',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Facebook',
                ),
                array (
                    'id' => 'social_flickr',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Flickr',
                ),
                array (
                    'id' => 'social_dribbble',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Dribbble',
                ),
                array (
                    'id' => 'social_yelp',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Yelp',
                ),
                array (
                    'id' => 'social_instagram',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Instagram',
                ),
                array (
                    'id' => 'social_google',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Google+',
                ),
                array (
                    'id' => 'social_linkedin',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'LinkedIn',
                ),
                array (
                    'id' => 'social_pinterest',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Pinterest',
                ),
                array (
                    'id' => 'social_digg',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Digg',
                ),
                array (
                    'id' => 'social_skype',
                    'type' => 'text',
                    'desc' => 'You should write as skype:username',
                    'title' => 'Skype',
                ),
                array (
                    'id' => 'social_twitter',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Twitter',
                ),
                array (
                    'id' => 'social_vimeo',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Vimeo',
                ),
                array (
                    'id' => 'social_youtube',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'YouTube',
                ),
                array (
                    'id' => 'social_rss',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'RSS',
                ),
                array (
                    'id' => 'social_stumbleupon',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Stumbleupon',
                ),
                array (
                    'id' => 'social_yahoo',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Yahoo',
                ),
                array (
                    'id' => 'social_foursquare',
                    'type' => 'text',
                    'desc' => 'Full Url',
                    'title' => 'Foursquare',
                ),
        )
    ) );    
    Redux::setSection( $opt_name, array(
            'title' => 'Blog Settings',
            'id' => 'blog_default',
            'icon' => 'el-icon-cog',
            'fields' => array (
              array (
                'id' => 'landmark_construction_theme_activate_blog',
                'type' => 'checkbox',
                'desc' => 'Please check this for using blog style, custom sidebar-footer instead of classic version',
                'title' => 'Enable Landmark Blog Styles',
                'options' => array(
                        '1' => 'Yes',
                ),
                'default' => array(
                        '1' => 'No',
                ),
              ),
              array (
                'id' => 'blog_style_loop',
                'type' => 'select',
                'desc' => 'Choose your style',
                'title' => 'Blog Page Style',
                'default' => 'style1',
                'options' => array(
                  'style1' => 'Style 1',
                  'style2' => 'Style 2',
                  'style3' => 'Style 3',
                  'style4' => 'Style 4',
                  'style5' => 'Style 5',
                  'style6' => 'Style 6',
                  'style7' => 'Style 7'
                ),
              ),              
              array (
                'id' => 'blog_style',
                'type' => 'select',
                'desc' => 'Choose your style',
                'title' => 'Single Blog Style',
                'default' => 'blog-style1',
                'options' => array(
                  'blog-style1' => 'Style 1',
                  'blog-style2' => 'Style 2',
                  'blog-style3' => 'Style 3',
                  'blog-style4' => 'Style 4',
                  'blog-style5' => 'Style 5',
                  'blog-style6' => 'Style 6',
                  'blog-style7' => 'Style 7'
                ),
              ),
              array (
                'id' => 'blog_bg',
                'type' => 'color',
                'title' => 'Blog Background',
              ),
                            array (
                'id' => 'blog_single_bg',
                'type' => 'color',
                'title' => 'Single Blog Background',
              ),               
              array (
                'id' => 'blog_widget_list',
                'type' => 'checkbox',
                'desc' => 'Choose your widgets that you want to use in single blog page',
                'title' => 'Blog Widgets',
                'options' => array(
                        '1' => 'Related Post',
                        '2' => 'About Author',
                        '3' => 'Share',
                        '4' => 'Tags',
                        '5' => 'Next-Prev Posts'
                ),
                'default' => array(
                        '1' => '0',
                        '2' => '0',
                        '3' => '0',
                        '4' => '0',
                        '5' => '0'
                ),
              ),                                            
              array (
                'id' => 'blog_header',
                'type' => 'text',
                'desc' => 'Write a title for your blog header',
                'title' => 'Blog Header',
              ),
              array (
                'id' => 'blog_caption',
                'type' => 'text',
                'title' => 'Blog Caption',
                'desc' => 'Subtitle for blog',
              ),
              array (
                'id' => 'blog_caption_image',
                'type' => 'media',
                'desc' => 'Upload image for caption background. You can leave it blank if you want to use a background color.',
                'class' => 'ot-upload-attachment-id',
                'title' => 'Caption Image',
              ),
              array (
                'id' => 'caption_background',
                'type' => 'color',
                'title' => 'Caption Background',
              ),              
              array (
                'id' => 'caption_text_color',
                'type' => 'color',
                'title' => 'Caption Text Color',
              ),
              array (
                'id' => 'activate_pagination',
                'type' => 'checkbox',
                'desc' => 'Check if you want to use pagination instead of prev-next',
                'title' => 'Activate Pagination',
                'options' => array (
                  'Yes' => 'Yes',
                ),
              ),
              array (
                'id' => 'read_more',
                'type' => 'text',
                'title' => 'Read More Text',
                'default' => '...',
              ),
              array (
                'id' => 'translate_comment',
                'type' => 'text',
                'title' => 'Translate "Comment"',
              ),
              array (
                'id' => 'translate_comments',
                'type' => 'text',
                'title' => 'Translate "Comments"',
              ),
              array (
                'id' => 'translate_byadmin',
                'type' => 'text',
                'title' => 'Translate "BY"',
              ),
              array (
                'id' => 'translate_likes',
                'type' => 'text',
                'title' => 'Translate "Likes"',
              ),                                          
              array (
                'id' => 'comment_title',
                'type' => 'text',
                'title' => 'Comment Title',
              ),
        )
    ) );

    Redux::setSection( $opt_name, array(
            'title' => 'Shop Settings',
            'id' => 'shop_default',
            'icon' => 'el-icon-cog',
            'fields' => array (
              array(
                  'id'       => 'shop_page_item',
                  'type'     => 'text',
                  'title'    => 'Item Count',
                  'desc'     => 'How many item that you want show per page',
                  'validate' => 'numeric',
                  'msg'      => 'please write a number'
              ),                              
              array (
                  'id' => 'shop_header',
                  'type' => 'text',
                  'desc' => 'Write a title for your shop header',
                  'title' => 'Shop Header',
              ),
              array (
                'id' => 'shop_caption',
                'type' => 'text',
                'title' => 'Shop Caption',
              ),
              array (
                'id' => 'shop_caption_image',
                'type' => 'media',
                'desc' => 'Upload image for caption background.',
                'class' => 'ot-upload-attachment-id',
                'title' => 'Caption Image',
              ),
              array (
                'id' => 'shop_text_color',
                'type' => 'color',
                'title' => 'Caption Text Color',
              ),

        )
    ) );
    Redux::setSection( $opt_name, array(
            'title' => 'Font Settings',
            'id' => 'theme_font_settings',
            'icon' => 'el-icon-cog',          
            'fields' => array( 
                array(
                    'id'          => 'body-font-type',
                    'type'        => 'typography', 
                    'title'       => "Body Fonts",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('body'),
                    'units'       =>'px',   
                    'all_styles' => 'true',
                ),
                array(
                    'id'          => 'header-font-type',
                    'type'        => 'typography', 
                    'title'       => "Header Links Fonts",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('#bliccaThemes-layout .bliccaThemes-header .nav>li>a'),
                    'desc' => 'Dont change color setting in this field, please use header customisation for color.',
                    'units'       =>'px',                  
                ),
                array(
                    'id'          => 'blog-font-type',
                    'type'        => 'typography', 
                    'title'       => "Blog Title",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('#bliccaThemes-layout .blog-wrapper .blog-content .blog-title'),
                    'units'       =>'px',                  
                ),                 
                array(
                    'id'          => 'singleblog-font-type',
                    'type'        => 'typography', 
                    'title'       => "Single Blog Paragraphs",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.blog-content-inner p'),
                    'units'       =>'px',                  
                ),
                array(
                    'id'          => 'woocommerce-font-type',
                    'type'        => 'typography', 
                    'title'       => "Woocommerce Product Title",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.woocommerce ul.products li.product h3'),
                    'units'       =>'px',                  
                ),
                array(
                    'id'          => 'woocommercesingle-font-type',
                    'type'        => 'typography', 
                    'title'       => "Woocommerce Single Product Title",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.woocommerce div.product .product_title'),
                    'units'       =>'px',                  
                ),     
                array(
                    'id'          => 'bodyh1font',
                    'type'        => 'typography', 
                    'title'       => "H1",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h1'),
                    'units'       =>'px',                  
                ), 
                array(
                    'id'          => 'bodyh2font',
                    'type'        => 'typography', 
                    'title'       => "H2",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h2'),
                    'units'       =>'px',                  
                ), 
                array(
                    'id'          => 'bodyh3font',
                    'type'        => 'typography', 
                    'title'       => "H3",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h3'),
                    'units'       =>'px',                  
                ), 
                array(
                    'id'          => 'bodyh4font',
                    'type'        => 'typography', 
                    'title'       => "H4",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h4'),
                    'units'       =>'px',                  
                ), 
                array(
                    'id'          => 'bodyh5font',
                    'type'        => 'typography', 
                    'title'       => "H5",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('H5'),
                    'units'       =>'px',                  
                ),                
                array(
                    'id'          => 'bodyh6font',
                    'type'        => 'typography', 
                    'title'       => "H6",
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h6'),
                    'units'       =>'px',                  
                ), 
                                                                 

            )
    ));
    Redux::setSection( $opt_name, array(
            'title' => 'Page Pre Loader',
            'id' => 'page_pre_loader',
            'icon' => 'el-icon-cog',          
            'fields' => array( 
                array (
                  'id' => 'loader_style',
                  'type' => 'select',
                  'desc' => 'Choose a loader style',
                  'title' => 'Navigation Link Style',
                  'default' => 'bt_disable_loader',
                  'options' => array (
                    'bt_disable_loader' => 'Disable Loader',
                    'bt_loader_style_1' => 'Bar Style 1',
                    'bt_loader_style_2' => 'Bar Style 2',
                    'bt_loader_style_3' => 'Bar Style 3',
                    'bt_loader_style_4' => 'Bar Style 4',
                    'bt_loader_style_5' => 'Bar Style 5',
                    'bt_loader_style_6' => 'Bar Style 6',              
                  ),
                ),
            )
    ));
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'landmark-construction-theme' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'landmark-construction-theme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
