<?php
/**
 * Guards Lite Theme Customizer
 *
 * @package Guards Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function guards_lite_customize_register( $wp_customize ) {
	
function guards_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->photobook_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->photobook_lite  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#c01120',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','guards-lite'),
			'description'	=> __('Select color from here.','guards-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('topheaderbg-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topheaderbg-color',array(
			'label' => __('Top Header Background Color','guards-lite'),
			'description'	=> __('Select background color for Top header.','guards-lite'),
			'section' => 'colors',
			'settings' => 'topheaderbg-color'
		))
	);
	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'label' => __('Header Background color','guards-lite'),
			'description'	=> __('Select background color for header.','guards-lite'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'label' => __('Footer Background Color','guards-lite'),
			'description'	=> __('Select background color for footer.','guards-lite'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);

	// Top Header Start
	$wp_customize->add_section(
        'tophead_section',
        array(
            'title' => __('Top Header', 'guards-lite'),
            'priority' => null,
			'description'	=> __('Add top header info here.','guards-lite'),	
        )
    );

    $wp_customize->add_setting('email-txt',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','guards-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('call-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('call-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','guards-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('add-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('add-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add Address here.','guards-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('facebook',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook',array(
			'type'	=> 'url',
			'label'	=> __('Add facebook link here.','guards-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('twitter',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter',array(
			'type'	=> 'url',
			'label'	=> __('Add twitter link here.','guards-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('youtube',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('youtube',array(
			'type'	=> 'url',
			'label'	=> __('Add youtube channel link here.','guards-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('linkedin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linkedin',array(
			'type'	=> 'url',
			'label'	=> __('Add linkedin link here.','guards-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('pinterest',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pinterest',array(
			'type'	=> 'url',
			'label'	=> __('Add pinterest link here.','guards-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('hide_tophead',array(
			'default' => true,
			'sanitize_callback' => 'guards_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_tophead', array(
		   'settings' => 'hide_tophead',
    	   'section'   => 'tophead_section',
    	   'label'     => __('Check this to hide Top Header.','guards-lite'),
    	   'type'      => 'checkbox'
     ));
	// Top Header End

	// Header Button Start
	$wp_customize->add_section(
        'headbtn_section',
        array(
            'title' => __('Header Button', 'guards-lite'),
            'priority' => null,
			'description'	=> __('Add top header button text and link here.','guards-lite'),	
        )
    );

    $wp_customize->add_setting('headbtn-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('headbtn-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add header button text here.','guards-lite'),
			'section'	=> 'headbtn_section'
	));

	$wp_customize->add_setting('headbtn-link',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('headbtn-link',array(
			'type'	=> 'url',
			'label'	=> __('Add Header Button link here.','guards-lite'),
			'section'	=> 'headbtn_section'
	));
	
	$wp_customize->add_setting('hide_headbtn',array(
			'default' => true,
			'sanitize_callback' => 'guards_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_headbtn', array(
		   'settings' => 'hide_headbtn',
    	   'section'   => 'headbtn_section',
    	   'label'     => __('Check this to hide Top Header.','guards-lite'),
    	   'type'      => 'checkbox'
     ));
	// Header Button End
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'guards-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','guards-lite'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','guards-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','guards-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','guards-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Read More','guards-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','guards-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'guards_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_slider', array(
	   'settings' => 'hide_slider',
	   'section'   => 'slider_section',
	   'label'     => __('Check this to hide slider.','guards-lite'),
	   'type'      => 'checkbox'
    ));
	// Slider Section End

	// First Section Start
	$wp_customize->add_section(
        'first_section',
        array(
            'title' => __('First Section', 'guards-lite'),
            'priority' => null,
			'description'	=> __('Select pages for First Section. This section will be displayed only when you select the static front page.','guards-lite'),	
        )
    );

    $wp_customize->add_setting('fsecttl',array(
		'default'	=> __('When You Need Expert Security','guards-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('fsecttl',array(
		'label'	=> __('Add Section title here.','guards-lite'),
		'section'	=> 'first_section',
		'setting'	=> 'fsecttl',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','guards-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','guards-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','guards-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('page-setting4',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting4',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 4th column','guards-lite'),
			'section'	=> 'first_section'
	));

	$wp_customize->add_setting('fsecmore',array(
		'default'	=> __('Read More','guards-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('fsecmore',array(
		'label'	=> __('Add Read More Text here.','guards-lite'),
		'section'	=> 'first_section',
		'setting'	=> 'fsecmore',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_first_section',array(
			'default' => true,
			'sanitize_callback' => 'guards_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_first_section', array(
		   'settings' => 'hide_first_section',
    	   'section'   => 'first_section',
    	   'label'     => __('Check this to hide section.','guards-lite'),
    	   'type'      => 'checkbox'
     ));
	// First Section End

	// Second Section Start		
	$wp_customize->add_section(
        'homepage_second_section',
        array(
            'title' => __('Second Section', 'guards-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage second section. This section will be displayed only when you select the static front page.','guards-lite'),	
        )
    );

    $wp_customize->add_setting('ser-second-sec-ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ser-second-sec-ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Section Sub Title Here','guards-lite'),
		'section'	=> 'homepage_second_section'
	));	
	
	$wp_customize->add_setting('ser-setting1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('ser-setting1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second section','guards-lite'),
		'section'	=> 'homepage_second_section'
	));

	$wp_customize->add_setting('ssecmore',array(
		'default'	=> __('Read More','guards-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ssecmore',array(
		'label'	=> __('Add Read More Text here.','guards-lite'),
		'section'	=> 'homepage_second_section',
		'setting'	=> 'fsecmore',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_second_section',array(
		'default' => true,
		'sanitize_callback' => 'guards_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_second_section', array(
	   'settings' => 'hide_second_section',
	   'section'   => 'homepage_second_section',
	   'label'     => __('Check this to hide section.','guards-lite'),
	   'type'      => 'checkbox'
     ));
	// Second Section End
}
add_action( 'customize_register', 'guards_lite_customize_register' );	

function guards_lite_css(){
		?>
        <style>
        		.top-header{
        			background-color:<?php echo esc_attr(get_theme_mod('topheaderbg-color','#000000')); ?>;
        		}
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sid
				ebar ul li a:hover,
				.blog-post h3.entry-title,
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.top-header a:hover,
				.sitenav ul li.current_page_item a, 
				.sitenav ul li a:hover, 
				.sitenav ul li.current_page_item ul li a:hover,
				#header .header-inner .logo p,
				h2.section_title{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#c01120')); ?>;
				}
				h3.widget-title,
				.nav-links .current,
				.nav-links a:hover,
				p.form-submit input[type="submit"],
				.home-content a,
				.social a:hover,
				#slider a.slide-button,
				.pagearea-content .wel-read,
				.header-button .head-btn,
				.icon-box:before{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#c01120')); ?>;
				}
				#header,
				.sitenav ul li.menu-item-has-children:hover > ul,
				.sitenav ul li.menu-item-has-children:focus > ul,
				.sitenav ul li.menu-item-has-children.focus > ul{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#ffffff')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#000000')); ?>;
				}
				section#pagearea .thumb::before{
					border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#c01120')); ?>;
				}
				
		</style>
	<?php }
add_action('wp_head','guards_lite_css');

function guards_lite_customize_preview_js() {
	wp_enqueue_script( 'guards-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'guards_lite_customize_preview_js' );