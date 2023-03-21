<?php

/**
 * Fired during plugin activation
 *
 * @package    arile-super
 */

/**
 * This class defines all code necessary to run during the plugin's activation.
 *
 */
class Arile_Super_Activator {

	public static function activate() {

        $fresh_site_activate = get_option( 'fresh_site_activate' );
		if ( (bool) $fresh_site_activate === false ) {
			        require arile_super_plugin_dir . 'inc/widgets/widget.php';
					$pages = array( esc_html__( 'Home', 'arile-super' ), esc_html__( 'Blog', 'arile-super' ) );
					foreach ($pages as $page){ 
					$post_data = array( 'post_author' => 1, 'post_name' => $page,  'post_status' => 'publish' , 'post_title' => $page, 'post_type' => 'page', ); 	
					if($page== 'Home'): 
						$page_option = 'page_on_front';
						$template = 'page-templates/frontpage.php';	
					else: 	
						$page_option = 'page_for_posts';
						$template = 'page.php';
					endif;
					$post_data = wp_insert_post( $post_data, false );
						if ( $post_data ){
							update_post_meta( $post_data, '_wp_page_template', $template );
							$page = get_page_by_title($page);
							update_option( 'show_on_front', 'page' );
							update_option( $page_option, $page->ID );
						}
					}
					
            update_option( 'fresh_site_activate', true );					
		}	
	}

}