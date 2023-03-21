<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aasta
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 ?>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'aasta' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
		<article class="theme-comment-section wow animate fadeInUp" data-wow-delay=".3s">	
			<div class="theme-comment-title">
				<h4>
				<?php echo comments_number(__( 'No Comments', 'aasta'), __('One comment','aasta'), __('% comments', 'aasta')); ?>
				</h4>
			</div>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
			<?php endif; ?>
			<?php wp_list_comments( array( 'callback' => 'aasta_comment' ) ); ?>
		</article>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'aasta' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'aasta' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'aasta' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
		?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php 
		/* translators: %1$s %2$s: logged in */
		echo sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a comment','aasta' ), esc_url(home_url( 'wp-login.php' ) . '?redirect_to=' .  urlencode(get_permalink()))); ?></p>
</p>
<?php else : ?>
	<article class="theme-comment-form wow animate fadeInUp" data-wow-delay=".3s">
	<?php  
	 $fields=array(
		'author' => '<div class="form-group"><label>'.__("Name",'aasta').'<span class="required">*</span></label><input class="form-control" name="author" id="author" value="" type="text"/></div>',
		'email' => '<div class="form-group"><label>'.__("Email",'aasta').'<span class="required">*</span></label><input class="form-control" name="email" id="email" value=""   type="email" ></div>',		
		);
	function my_fields($fields) { 
		return $fields;
	}
	add_filter('comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group"><label>'.__("Comment",'aasta').'</label>
		<textarea id="comments" rows="5" class="form-control" name="comment" type="text"></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as",'aasta' ).' '.'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. ' '. '<a href="'. wp_logout_url( get_permalink() ).'" title="'. esc_attr__("Log out of this account",'aasta').'">'.__("Logout",'aasta').'</a>' . '</p>',
		'id_submit'=> 'send_button',
		'label_submit'=>__( 'Submit','aasta'),
		'comment_notes_after'=> '',
		'title_reply'=> '<div class="theme-comment-title"><h4>'.__('Leave a Reply','aasta').'</h4></div>',
		'id_form'=> 'action'
		);
	comment_form($defaults);?>						
<?php endif; // If registration required and not logged in ?>
<?php endif;  ?>