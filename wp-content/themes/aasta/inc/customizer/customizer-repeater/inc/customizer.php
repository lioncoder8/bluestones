<?php
function aasta_repeater_register( $wp_customize ) {
	require AASTA_PARENT_INC_DIR . '/customizer/customizer-repeater/class/customizer-repeater-control.php';
}
add_action( 'customize_register', 'aasta_repeater_register' );

function aasta_repeater_sanitize($input){
	$input_decoded = json_decode($input,true);

	if(!empty($input_decoded)) {
		foreach ($input_decoded as $boxk => $box ){
			foreach ($box as $key => $value){

					$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );

			}
		}
		return json_encode($input_decoded);
	}
	return $input;
}