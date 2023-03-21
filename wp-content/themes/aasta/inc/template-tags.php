<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aasta
 */
 
function aasta_header_logo() {
	$aasta_sticky_bar_logo = get_theme_mod('aasta_sticky_bar_logo');
		the_custom_logo(); 
	?>
					
	<?php if($aasta_sticky_bar_logo != null) : ?>	
			<a class="sticky-navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url($aasta_sticky_bar_logo); ?>" class="custom-logo" alt="<?php esc_attr(bloginfo("name")); ?>"></a>
	<?php endif; ?>
	
    <?php if ( display_header_text() ) : ?>
	<?php if ( get_bloginfo( 'title' )  !== '' || get_bloginfo( 'description' )  !== '' ){ ?>
	<div class="site-branding-text">
	    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h2>
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div>
	<?php } endif;
} 

function aasta_header_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}
add_filter('get_custom_logo','aasta_header_logo_class');

if ( ! function_exists( 'aasta_comment' ) ) :
function aasta_comment( $comment, $args, $depth ) 
{  ?>
        <div <?php comment_class('media comment-box'); ?> id="comment-<?php comment_ID(); ?>">
			<a class="pull-left-comment">
            <?php echo get_avatar($comment); ?>
            </a>
            <div class="media-body">
			   <div class="comment-detail">
				<h5 class="comment-detail-title"><?php printf(('%s'), get_comment_author_link()) ?>
				<time class="comment-date">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) );?>">
				<?php comment_date('F j, Y');?>&nbsp;<?php esc_html_e('at','aasta');?>&nbsp;<?php comment_time('g:i a'); ?>
				</a>
				</time></h5>
				<?php comment_text() ;?>
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'aasta' ); ?></em>
				<br/>
				<?php endif; ?>
				</div>
			</div>
		</div>
<?php
}
endif;
add_filter('get_avatar','aasta_gravatar_class');
function aasta_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-fluid comment-img", $class);
    return $class;
}

function aasta_read_more_button_class($read_class)
	{  global $post;
		return '<p><a href="' . esc_url( get_permalink() ) . "#more-{$post->ID}\" class=\"more-link\">" .__('Read More','aasta')."</a></p>";
	}
add_filter( 'the_content_more_link', 'aasta_read_more_button_class' );

function aasta_post_thumbnail() {
    if(has_post_thumbnail()){
	    echo '<figure class="post-thumbnail"><a href="'.esc_url( get_the_permalink() ).'">';
		the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
		echo '</a></figure>';
	}
}

// theme page header title functions
function aasta_theme_page_header_title(){
	if( is_archive() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		if ( is_day() ) :
		/* translators: %1$s %2$s: day */
		  printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Archives','aasta'), get_the_date() );  
        elseif ( is_month() ) :
		/* translators: %1$s %2$s: month */
		  printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Archives','aasta'), get_the_date( 'F Y' ) );
        elseif ( is_year() ) :
		/* translators: %1$s %2$s: year */
		  printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Archives','aasta'), get_the_date( 'Y' ) );
		elseif( is_author() ):
		/* translators: %1$s %2$s: author */
			printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('All posts by','aasta'), get_the_author() );
        elseif( is_category() ):
		/* translators: %1$s %2$s: category */
			printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Category','aasta'), single_cat_title( '', false ) );
		elseif( is_tag() ):
		/* translators: %1$s %2$s: tag */
			printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Tag','aasta'), single_tag_title( '', false ) );
		elseif( class_exists( 'WooCommerce' ) && is_shop() ):
		/* translators: %1$s %2$s: WooCommerce */
			printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Shop','aasta'), single_tag_title( '', false ));
        elseif( is_archive() ): 
		the_archive_title( '<h1 class="text-white">', '</h1>' ); 
		endif;
		echo '</h1></div>';
	}
	elseif( is_404() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		/* translators: %1$s: 404 */
		printf( esc_html__('404','aasta') );
		echo '</h1></div>';
	}
	elseif( is_search() )
	{
		echo '<div class="page-header-title"><h1 class="text-white">';
		/* translators: %1$s %2$s: search */
		printf( esc_html__( '%1$s %2$s', 'aasta' ), esc_html__('Search results for','aasta'), get_search_query() );
		echo '</h1></div>';
	}
	else
	{
		echo '<div class="page-header-title"><h1 class="text-white">'.esc_html( get_the_title() ).'</h1></div>';
	}
}

function aasta_bootstrap_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
add_filter( 'wp_nav_menu', 'aasta_bootstrap_menu_notitle' );

// theme page header Url functions
function aasta_curPageURL() {
	$page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$page_url .= "s";
	}
	$page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}

// theme page header breadcrumbs functions
if( !function_exists('aasta_page_header_breadcrumbs') ):
	function aasta_page_header_breadcrumbs() { 	
		global $post;
		$home_Link = home_url();
	    echo '<ul class="page-breadcrumb text-right">';			
				if (is_home() || is_front_page()) :
					echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','aasta').'</a></li>';
					    echo '<li class="active">'; echo single_post_title(); echo '</li>';
						else:
						echo '<li><a href="'.esc_url($home_Link).'">'.esc_html__('Home','aasta').'</a></li>';
						if ( is_category() ) {
							echo '<li class="active"><a href="'. aasta_curPageURL() .'">' . esc_html__('Archive by category','aasta').' "' . single_cat_title('', false) . '"</a></li>';
						} elseif ( is_day() ) {
							echo '<li class="active"><a href="'. esc_url(get_year_link(esc_attr(get_the_time('Y')))) . '">'. esc_html(get_the_time('Y')) .'</a>';
							echo '<li class="active"><a href="'. esc_url(get_month_link(esc_attr(get_the_time('Y')),esc_attr(get_the_time('m')))) .'">'. esc_html(get_the_time('F')) .'</a>';
							echo '<li class="active"><a href="'. aasta_curPageURL() .'">'. esc_html(get_the_time('d')) .'</a></li>';
						} elseif ( is_month() ) {
							echo '<li class="active"><a href="' . get_year_link(esc_attr(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a>';
							echo '<li class="active"><a href="'. aasta_curPageURL() .'">'. esc_html(get_the_time('F')) .'</a></li>';
						} elseif ( is_year() ) {
							echo '<li class="active"><a href="'. aasta_curPageURL() .'">'. esc_html(get_the_time('Y')) .'</a></li>';
                        } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
						if ( get_post_type() != 'post' ) {
							$cat = get_the_category(); 
							$cat = $cat[0];
							echo '<li>';
								echo get_category_parents($cat, TRUE, '');
							echo '</li>';
							echo '<li class="active"><a href="' . aasta_curPageURL() . '">'. get_the_title() .'</a></li>';
						} }  
						elseif ( is_page() && $post->post_parent ) {
							$parent_id  = $post->post_parent;
							$breadcrumbs = array();
							while ($parent_id) {
							$page = get_page($parent_id);
							$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
                            }
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb;
							echo '<li class="active"><a href="' . aasta_curPageURL() . '">'. get_the_title().'</a></li>';
                        }
						elseif( is_search() )
						{
							echo '<li class="active"><a href="' . aasta_curPageURL() . '">'. get_search_query() .'</a></li>';
						}
						elseif( is_404() )
						{
							echo '<li class="active"><a href="' . aasta_curPageURL() . '">'.esc_html__('Error 404','aasta').'</a></li>';
						}
						else { 
						    echo '<li class="active"><a href="' . aasta_curPageURL() . '">'. get_the_title() .'</a></li>';
						}
					endif;
			echo '</ul>';
        }
endif;
 
 if ( ! function_exists( 'aasta_sanitize_select' ) ) :
	/**
	 * Sanitize select, radio.
	 *
	 */
	function aasta_sanitize_select( $input, $setting ) {
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;

function aasta_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

if( ! function_exists( 'aasta_custom_customizer_options' ) ):
    function aasta_custom_customizer_options() {

        $aasta_testomonial_background_image = get_theme_mod('aasta_testomonial_background_image');
		$aasta_page_header_background_image = get_theme_mod('aasta_page_header_background_image');
		$aasta_sticky_bar_logo = get_theme_mod('aasta_sticky_bar_logo');
		$aasta_custom_logo_size = get_theme_mod('aasta_custom_logo_size', array('slider' => 224,'suffix' => 'px',));
        
        $output_css = '';
		if($aasta_testomonial_background_image != null){ 
			$output_css .="	.theme-testimonial { 
				background-image: url( " .esc_url($aasta_testomonial_background_image). ");
				background-size: cover;
				background-position: center center;
			}\n";
        }

		if($aasta_custom_logo_size['slider'] != null) :
            $output_css .=".navbar img.custom-logo, .theme-header-logo-center img.custom-logo {
			max-width: ".$aasta_custom_logo_size['slider']."px;
			height: auto;
			}\n";
        endif;

		if ( has_header_image() ) :
			$output_css .=".theme-page-header-area {
				background: #17212c url(" .esc_url( get_header_image() ). ");
				background-attachment: scroll;
				background-position: top center;
				background-repeat: no-repeat;
				background-size: cover;
			}\n";
		endif; 

        if($aasta_sticky_bar_logo != null) :
            $output_css .=".header-fixed-top .navbar-brand {
				display: none !important;
			}
            .not-sticky .sticky-navbar-brand {
				display: none !important;
			}\n";
        endif;
		
		if ( is_user_logged_in() && is_admin_bar_showing() ) {
            $output_css .="@media (min-width: 600px){
                .navbar.header-fixed-top{top:32px;}
            }\n";
        }

        wp_add_inline_style( 'aasta-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'aasta_custom_customizer_options' );

/**
* Get started notice
*/

add_action( 'wp_ajax_aasta_dismissed_notice_handler', 'aasta_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function aasta_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function aasta_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="aasta-getting-started-notice clearfix">
                    <div class="aasta-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'aasta' ); ?>" />
                    </div><!-- /.aasta-theme-screenshot -->
                    <div class="aasta-theme-notice-content">
                        <h2 class="aasta-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'aasta' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('To take full advantage of all the features of this theme, please install and activate the <strong>Arile Super</strong> plugin, then enjoy this theme.', 'aasta')) ?></p>

                        <a class="aasta-btn-get-started button button-primary button-hero aasta-button-padding" href="#" data-name="" data-slug="">
						<?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Get started with %1$s', 'aasta' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
						
						</a><span class="aasta-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.aasta-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'aasta_deprecated_hook_admin_notice' );

/**
* Plugin installer
*/

add_action( 'wp_ajax_install_act_plugin', 'aasta_admin_install_plugin' );

function aasta_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/arile-super' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'arile-super' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'arile-super/arile-super.php' );
    }
}

/**
 * Menu 
*/
function aasta_custom_menu_script()
{
	$custom_logo = get_theme_mod( 'custom_logo' );
	if(display_header_text()== true && $custom_logo != null && get_bloginfo( 'title' )  !== '' ){
		$toggle_value = 2; 
	}else{
		$toggle_value = 1; 
	}
?>
<script>
	// This JS added for the Toggle button to work with the focus element.
		if (window.innerWidth < 992) {
			
			document.addEventListener('keydown', function(e) {
			let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
				if (!isTabPressed) {
					return;
				}
				
			const  focusableElements =
				'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
			const modal = document.querySelector('.navbar.navbar-expand-lg'); // select the modal by it's id

			const firstFocusableElement = modal.querySelectorAll(focusableElements)[<?php echo $toggle_value; ?>]; // get first element to be focused inside modal
			const focusableContent = modal.querySelectorAll(focusableElements);
			const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal

			  if (e.shiftKey) { // if shift key pressed for shift + tab combination
				if (document.activeElement === firstFocusableElement) {
				  lastFocusableElement.focus(); // add focus for the last focusable element
				  e.preventDefault();
				}
			  } else { // if tab key is pressed
				if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
				  firstFocusableElement.focus(); // add focus for the first focusable element
				  e.preventDefault();			  
				}
			  }

			});
		}
</script>
<?php	
}
add_action('wp_footer','aasta_custom_menu_script');