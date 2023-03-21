<?php
/**
 *
 * @package arile-super
 */	

if ( ! function_exists( 'arilesuper_aasta_main_slider_default_content' ) ) :
		/* Main slider content  */
		function arilesuper_aasta_main_slider_default_content( $wp_customize ){
			
			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;
			
				$aasta_main_slider_data = $wp_customize->get_setting( 'aasta_main_slider_content' );	
				if ( ! empty( $aasta_main_slider_data ) ) {		
				    if('Aasta Light' == $activate_theme){
						$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'Grow Your Business Fast', 'arile-super' ),
						'subtitle'       => esc_html__( 'Business Growth Online', 'arile-super' ),
						'text'       => esc_html__( 'Aasta Light is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide3.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'Build a Beautiful Website', 'arile-super' ),
						'subtitle'       => esc_html__( 'Pixels Perfect Design ', 'arile-super' ),
						'text'       => esc_html__( 'Aasta Light is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide2.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
				}elseif('Consultexo' == $activate_theme){
						$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'Get A Free Consultation', 'arile-super' ),
						'subtitle'       => esc_html__( 'Best Business Advisors', 'arile-super' ),
						'text'       => esc_html__( "We provide the world's best finance and consulting services to grow your business, so contact us and see the results quickly.", 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide8.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'We help to get solutions', 'arile-super' ),
						'subtitle'       => esc_html__( 'Strategies for Enduring Success', 'arile-super' ),
						'text'       => esc_html__( "We provide the world's best finance and consulting services to grow your business, so contact us and see the results quickly.", 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide9.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
				}elseif('Appointech' == $activate_theme){
						$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'Welcome to Appointech', 'arile-super' ),
						'subtitle'       => esc_html__( 'Growth Your Business', 'arile-super' ),
						'text'       => esc_html__( "We provide all types of business solutions and services to our valuable customers for the growth of their businesses to the next level.", 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide10.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'Build a Beautiful Website', 'arile-super' ),
						'subtitle'       => esc_html__( 'Pixels Perfect Design', 'arile-super' ),
						'text'       => esc_html__( "We provide all types of business solutions and services to our valuable customers for the growth of their businesses to the next level.", 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide2.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
				}elseif('InteriorHub' == $activate_theme){
					
					$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'BEST INTERIOR DESIGN', 'arile-super' ),
						'subtitle'       => esc_html__( 'STYLE & COMFORT', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of interior and architecture design services such as exterior design, kitchen design, room design, furniture design, light design, etc. With the help of which you can build your dream home.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide4.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'INNOVATE YOUR HOME', 'arile-super' ),
						'subtitle'       => esc_html__( 'HOME DECOR', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of interior and architecture design services such as exterior design, kitchen design, room design, furniture design, light design, etc. With the help of which you can build your dream home.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide5.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
					
				}elseif('AgencyWP' == $activate_theme){
					
					$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'Business grow online', 'arile-super' ),
						'subtitle'       => esc_html__( 'Best business goals', 'arile-super' ),
						'text'       => esc_html__( 'AgencyWP is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide6.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'A world of opportunities', 'arile-super' ),
						'subtitle'       => esc_html__( 'Criteria for success', 'arile-super' ),
						'text'       => esc_html__( 'AgencyWP is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide7.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
							
				}elseif('Architect Studio' == $activate_theme){
					
					$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'BEST ARCHITECT DESIGN', 'arile-super' ),
						'subtitle'       => esc_html__( 'EFFECTIVE SOLUTIONS', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of architecture and interior design services such as exterior design, house design, kitchen design, room design, furniture design, light design, etc. With the help of which you can build your dream home.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide11.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'INNOVATE YOUR HOME', 'arile-super' ),
						'subtitle'       => esc_html__( 'HOME DECOR', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of architecture and interior design services such as exterior design, house design, kitchen design, room design, furniture design, light design, etc. With the help of which you can build your dream home.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide12.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
					
				}elseif('StockPress' == $activate_theme){
					
					$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'We Provide Innovative Business Services', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of business solutions and services to our valuable customers for the growth of their businesses to the next level.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide13.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'Build a Beautiful Website', 'arile-super' ),
						'text'       => esc_html__( 'We provide all types of business solutions and services to our valuable customers for the growth of their businesses to the next level.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide14.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
					
				}
				
				else{
					
					$aasta_main_slider_data->default = json_encode( array(
						array(
						'title'      => esc_html__( 'Welcome to Aasta', 'arile-super' ),
						'subtitle'       => esc_html__( 'A Multipurpose WP Theme', 'arile-super' ),
						'text'       => esc_html__( 'Aasta is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide1.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b10',				
						),
						array(
						'title'      => esc_html__( 'Build a Beautiful Website', 'arile-super' ),
						'subtitle'       => esc_html__( 'Pixels Perfect Design ', 'arile-super' ),
						'text'       => esc_html__( 'Aasta is a most popular Multipurpose WordPress themes in the world. The designs are clean, modern, and feature strong default colors that inspire confidence.', 'arile-super' ),
						'button_text'      => __('Check it out','arile-super'),
						'link'       => '#',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-slide2.jpg',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b14',
						),		
					   )
					);
					
				}
				}
		}
add_action( 'customize_register', 'arilesuper_aasta_main_slider_default_content' );
endif;

/* Service content  */
if ( ! function_exists( 'arilesuper_aasta_service_default_content' ) ) :		
    function arilesuper_aasta_service_default_content( $wp_customize ){
			$aasta_service_data = $wp_customize->get_setting( 'aasta_service_content' );
			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;
				if ( ! empty( $aasta_service_data ) ) {
                   if('InteriorHub' == $activate_theme){					
					$aasta_service_data->default = json_encode( array(
						array(
						'icon_value' => 'fa-laptop',
						'title'      => esc_html__( 'INTERIOR DESIGN', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service4.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
						'icon_value' => 'fa fa-opencart',
						'title'      => esc_html__( 'ARCHITECTURAL DESIGN', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service5.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
						'icon_value' => 'fa fa-users',
						'title'      => esc_html__( 'EXTERIOR DESIGN', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service6.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b17',
						),
						
					) );
				}elseif('Consultexo' == $activate_theme){					
					$aasta_service_data->default = json_encode( array(
						array(
						'icon_value' => 'fa-laptop',
						'title'      => esc_html__( 'Corporate Finance', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service7.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
						'icon_value' => 'fa fa-opencart',
						'title'      => esc_html__( 'Consulting Service', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service8.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
						'icon_value' => 'fa fa-users',
						'title'      => esc_html__( 'Market Analysis', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service9.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b17',
						),
						
					) );
				}elseif('AgencyWP' == $activate_theme || 'Appointech' == $activate_theme|| 'StockPress' == $activate_theme){
					$aasta_service_data->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-globe',
						'title'      => esc_html__( 'SEO Friendly', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_icon',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service1.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
						'icon_value' => 'fa fa-language',
						'title'      => esc_html__( 'Translation', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_icon',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service2.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
						'icon_value' => 'fa fa-mobile',
						'title'      => esc_html__( 'Creative Design', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_icon',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service3.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b17',
						),
						
					) );	
				
				}elseif('Architect Studio' == $activate_theme){
					
					$aasta_service_data->default = json_encode( array(
						array(
						'icon_value' => 'fa-laptop',
						'title'      => esc_html__( 'ARCHITECTURAL DESIGN', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service10.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
						'icon_value' => 'fa fa-opencart',
						'title'      => esc_html__( 'HOUSE DECOR', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service11.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
						'icon_value' => 'fa fa-users',
						'title'      => esc_html__( 'EXTERIOR DESIGN', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service12.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b17',
						),
						
					) );
					
				}else{
					$aasta_service_data->default = json_encode( array(
						array(
						'icon_value' => 'fa-laptop',
						'title'      => esc_html__( 'SEO Friendly', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service1.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
						'icon_value' => 'fa fa-opencart',
						'title'      => esc_html__( 'Translation & RTL Ready', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service2.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
						'icon_value' => 'fa fa-users',
						'title'      => esc_html__( 'Creative Design', 'arile-super' ),
						'text'       => 'Lorem Ipsum is simply text of the printing and typesetting industry. Lorem Ipsum has been standard dummy.',
						'choice'    => 'customizer_repeater_image',
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-service3.jpg',
						'link'       => '#',
						'open_new_tab' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b17',
						),
						
					) );	
				}	
				}
	    }
add_action( 'customize_register', 'arilesuper_aasta_service_default_content' );
endif;

/* Project content  */
if ( ! function_exists( 'arilesuper_aasta_project_default_content' ) ) :		
	function arilesuper_aasta_project_default_content( $wp_customize ){
			$aasta_service_data = $wp_customize->get_setting( 'aasta_service_content' );
			$activate_theme_data = wp_get_theme(); // getting current theme data
			$activate_theme = $activate_theme_data->name;
			$aasta_project_data = $wp_customize->get_setting( 'aasta_project_content' );
			if ( ! empty( $aasta_project_data ) ) {
			    if('Consultexo' == $activate_theme){							
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project1.jpg',
						'title'      => __('Growth Expansion','arile-super'),
						'text'       => __('','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project2.jpg',
						'title'      => __('Market Expansion','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project3.jpg',
						'title'      => __('Data Analytics','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
					    array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project8.jpg',
						'title'      => __('Consumer Products','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				}
                elseif('InteriorHub' == $activate_theme){							
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project4.jpg',
						'title'      => __('BEDROOM LIGHTING DÉCOR','arile-super'),
						'text'       => __('','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project5.jpg',
						'title'      => __('EXTERIOR RENOVATION','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project6.jpg',
						'title'      => __('ARCHITECTURE DESIGN','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
					    array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project7.jpg',
						'title'      => __('MODULAR KITCHEN DESIGN','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				}elseif('AgencyWP' == $activate_theme ){
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project1.jpg',
						'title'      => __('StartUp Business','arile-super'),
						'text'       => __('','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project2.jpg',
						'title'      => __('Market Expansion','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project3.jpg',
						'title'      => __('Data Analytics','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project8.jpg',
						'title'      => __('Internet marketing','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				
				}elseif('Appointech' == $activate_theme || 'StockPress' == $activate_theme){
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project1.jpg',
						'title'      => __('StartUp Business','arile-super'),
						'text'       => __('Lorem ipsum is simply text..','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project2.jpg',
						'title'      => __('Market Expansion','arile-super'),
						'text'       => __('Lorem ipsum is simply text..','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project3.jpg',
						'title'      => __('Data Analytics','arile-super'),
						'text'       => __('Lorem ipsum is simply text..','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project8.jpg',
						'title'      => __('Internet marketing','arile-super'),
						'text'       => __('Lorem ipsum is simply text..','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				
				}elseif('Architect Studio' == $activate_theme ){
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project9.jpg',
						'title'      => __('HOME RENOVATIONS','arile-super'),
						'text'       => __('','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project10.jpg',
						'title'      => __('EXTERIOR RENOVATION','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project11.jpg',
						'title'      => __('ARCHITECTURE DESIGN','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project12.jpg',
						'title'      => __('INTERIOR DESIGN','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				
				}else{
					$aasta_project_data->default = json_encode( array(
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project1.jpg',
						'title'      => __('StartUp Business','arile-super'),
						'text'       => __('','arile-super'),	
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project2.jpg',
						'title'      => __('Market Expansion','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-project3.jpg',
						'title'      => __('Data Analytics','arile-super'),
						'text'       => __('','arile-super'),
						'id'         => 'customizer_repeater_56d7ea7f40b71',
						),
						
					) );
				}						
				}
        }
add_action( 'customize_register', 'arilesuper_aasta_project_default_content' );
endif;

/* Testimonial content  */
if ( ! function_exists( 'arilesuper_aasta_testimonial_default_content' ) ) :		
	function arilesuper_aasta_testimonial_default_content( $wp_customize ){
		$aasta_testimonial_data = $wp_customize->get_setting( 'aasta_testimonial_content' );
				if ( ! empty( $aasta_testimonial_data ) ) 
				{			
					$aasta_testimonial_data->default = json_encode( array(
						array(
						'title'      => 'Rosa Linn',
						'text'       => '"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"',
						'designation' => __('Designer','arile-super'),
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-user1.jpg',
						'id'         => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
						'title'      => 'Herman Girard',
						'text'       => '"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"',
						'designation' => __('Sales Manager','arile-super'),
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-user2.jpg',
						'id'         => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
						'title'      => 'Alexia Dior',
						'text'       => '"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"',
						'designation' => __('Designer','arile-super'),
						'image_url'  => arile_super_plugin_url .'/inc/aasta/images/theme-user3.jpg',
						'id'         => 'customizer_repeater_56d7ea7f40b33',
						),
					) );
				}
        }
add_action( 'customize_register', 'arilesuper_aasta_testimonial_default_content' );
endif;