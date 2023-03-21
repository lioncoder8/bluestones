<?php
/**
 * Typography. 
 * @package     aasta
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'Aasta_Customize_Theme_Typography_Option' ) ) :

	/**
	 * Theme Typography option.
	 */
	class Aasta_Customize_Theme_Typography_Option extends Aasta_Customize_Base_Option {

		public function elements() {

			return array(
			
/* ---------- Enable/Disable TYPOGRAPHY -------------- */		
			
			    'aasta_typography_disabled' => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'Aasta_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable Typography', 'aasta' ),
						'section'  => 'aasta_enable_disable_typography',
					),
				),	
            				

			);

		}

	}

	new Aasta_Customize_Theme_Typography_Option();

endif;
