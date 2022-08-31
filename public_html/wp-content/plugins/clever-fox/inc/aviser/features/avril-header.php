<?php
function aviser_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'clever-fox'),
		) 
	);
	
	/*=========================================
	Avril Site Identity
	=========================================*/

	// Logo Width // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'clever-fox' ),
				'section'  => 'title_tagline',
				'input_attrs' => array(
				'min'    => 0,
				'max'    => 500,
				'step'   => 1,
				//'suffix' => 'px', //optional suffix
			),
			) ) 
		);
	}
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );

	// Social
	$wp_customize->add_setting(
		'hdr_top_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_social',
		array(
			'type' => 'hidden',
			'label' => __('Social Icons','clever-fox'),
			'section' => 'above_header',
			
		)
	);
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'priority' => 2,
			 'default' => avril_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new AVRIL_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'above_header',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
		//Pro feature
		class Avril_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
				if ( 'Aviser' == $theme->name){	
			?>
				<a class="customizer_social_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/aviser-pro/" target="_blank"  style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}
			}
		}
		
		$wp_customize->add_setting( 'avril_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Avril_social__section_upgrade(
			$wp_customize,
			'avril_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
					'settings'				=> 'avril_social_upgrade_to_pro',
				)
			)
		);	
	
	
	// Welcome
	$wp_customize->add_setting(
		'hdr_top_welcome'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_top_welcome',
		array(
			'type' => 'hidden',
			'label' => __('Welcome Content','clever-fox'),
			'section' => 'above_header',
			
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'hs_hdr_welcome' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_welcome', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	// icon // 
	$wp_customize->add_setting(
    	'hdr_welcome_icon',
    	array(
	        'default' => 'fa-building-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'hdr_welcome_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	
	//  title // 
	$wp_customize->add_setting(
    	'hdr_welcome_ttl',
    	array(
	        'default'			=> __('Welcome to our Business Agency','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'hdr_welcome_ttl',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
	// Time 
	$wp_customize->add_setting(
		'hdr_top_time'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_top_time',
		array(
			'type' => 'hidden',
			'label' => __('Time','clever-fox'),
			'section' => 'above_header',
			
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'hs_hdr_time' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_time', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	// icon // 
	$wp_customize->add_setting(
    	'hdr_time_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'hdr_time_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	//  title // 
	$wp_customize->add_setting(
    	'hdr_time_title',
    	array(
	        'default'			=> __('Opening Hours - 10 Am to 6 PM','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'hdr_time_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_mbl'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mbl',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'above_header',
			
		)
	);
	$wp_customize->add_setting( 
		'hide_show_mbl_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_mbl_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_mobile_icon',
    	array(
	        'default' => 'fa-map-marker',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_mobile_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_mobile_title',
    	array(
	        'default'			=> __('Online 24x7','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_mobile_sbtitle',
    	array(
	        'default'			=> __('+1-0120-400-00-00','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_sbtitle',
		array(
		    'label'   		=> __('Subtitle','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_email_title',
    	array(
	        'default'			=> __('Email Us','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_email_sbtitle',
    	array(
	        'default'			=> __('email@email.com','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_sbtitle',
		array(
		    'label'   		=> __('Subtitle','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Contact
	$wp_customize->add_setting(
		'hdr_top_contact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact',
		array(
			'type' => 'hidden',
			'label' => __('Contact','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cntct_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cntct_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_contct_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'tlh_contct_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_contact_title',
    	array(
	        'default'			=> __('8:00AM - 6:00PM','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 11,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile subtitle // 
	$wp_customize->add_setting(
    	'tlh_contact_sbtitle',
    	array(
	        'default'			=> __('Monday to Saturday','clever-fox'),
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_sbtitle',
		array(
		    'label'   		=> __('Subtitle','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
}
add_action( 'customize_register', 'aviser_lite_header_settings' );

// Header selective refresh
function aviser_lite_header_partials( $wp_customize ){
	
	// tlh_mobile_title
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_title', array(
		'selector'            => '.contact-details .wgt-3 .text',
		'settings'            => 'tlh_mobile_title',
		'render_callback'  => 'avril_tlh_mobile_title_render_callback',
	) );
	
	// tlh_mobile_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_sbtitle', array(
		'selector'            => '.contact-details .wgt-3 .title',
		'settings'            => 'tlh_mobile_sbtitle',
		'render_callback'  => 'avril_tlh_mobile_sbtitle_render_callback',
	) );
	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '.contact-details .wgt-2 .text',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'avril_tlh_email_title_render_callback',
	) );
	
	// tlh_email_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_email_sbtitle', array(
		'selector'            => '.contact-details .wgt-2 .title',
		'settings'            => 'tlh_email_sbtitle',
		'render_callback'  => 'avril_tlh_email_sbtitle_render_callback',
	) );
	
	// tlh_contact_title
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_title', array(
		'selector'            => '.contact-details .wgt-1 .text',
		'settings'            => 'tlh_contact_title',
		'render_callback'  => 'avril_tlh_contact_title_render_callback',
	) );
	
	// tlh_contact_sbtitle
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_sbtitle', array(
		'selector'            => '.contact-details .wgt-1 .title',
		'settings'            => 'tlh_contact_sbtitle',
		'render_callback'  => 'avril_tlh_contact_sbtitle_render_callback',
	) );
	
	// hdr_time_title
	$wp_customize->selective_refresh->add_partial( 'hdr_time_title', array(
		'selector'            => '#above-header .wgt-5 .text',
		'settings'            => 'hdr_time_title',
		'render_callback'  => 'avril_hdr_time_title_render_callback',
	) );
	
	// hdr_welcome_ttl
	$wp_customize->selective_refresh->add_partial( 'hdr_welcome_ttl', array(
		'selector'            => '#above-header .wgt-6 .text',
		'settings'            => 'hdr_welcome_ttl',
		'render_callback'  => 'avril_hdr_welcome_ttl_render_callback',
	) );
	}

add_action( 'customize_register', 'aviser_lite_header_partials' );

// tlh_mobile_title
function avril_tlh_mobile_title_render_callback() {
	return get_theme_mod( 'tlh_mobile_title' );
}

// tlh_mobile_sbtitle
function avril_tlh_mobile_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_mobile_sbtitle' );
}

// tlh_email_title
function avril_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}

// tlh_email_sbtitle
function avril_tlh_email_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_email_sbtitle' );
}

// tlh_contact_title
function avril_tlh_contact_title_render_callback() {
	return get_theme_mod( 'tlh_contact_title' );
}

// tlh_contact_sbtitle
function avril_tlh_contact_sbtitle_render_callback() {
	return get_theme_mod( 'tlh_contact_sbtitle' );
}

// hdr_time_title
function avril_hdr_time_title_render_callback() {
	return get_theme_mod( 'hdr_time_title' );
}

// hdr_welcome_ttl
function avril_hdr_welcome_ttl_render_callback() {
	return get_theme_mod( 'hdr_welcome_ttl' );
}