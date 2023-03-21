<?php
/** 
 * Customize Heading control class.
 *
 * @package aasta
 * 
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class Aasta_Customize_Upgrade_Control
 */
class Aasta_Customize_Upgrade_Control extends Aasta_Customize_Base_Control {

	/**
	 * Customize control type.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'aasta-upgrade';

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
		$upgrade_to_pro_link = 'https://themearile.com/aasta-pro-theme/';
		?>

		<div class="aasta-upgrade-pro-message" style="display:none;";>
			<# if ( data.label ) { #><h4 class="customize-control-title"><?php echo wp_kses_post( 'Upgrade to <a href="'.$upgrade_to_pro_link.'" target="_blank" > Aasta Pro </a> to be add more', 'aasta'); ?> {{{ data.label }}} <?php esc_html_e( 'and get the other pro features.', 'aasta') ?></h4><# } #>
		</div>

		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}

}