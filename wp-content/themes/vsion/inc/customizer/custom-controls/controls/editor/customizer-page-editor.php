<?php
/**
 * Sync functions for control.
 *
 * @package vsion
 * @since vsion 1.0
 
 */

/**
 * Display editor for page editor control.
 *
 * @since 1.1.51
 */
function vsion_customize_editor() {
	?>
	<div id="wp-editor-widget-container" style="display: none;">
		<a class="close" href="javascript:WPEditorWidget.hideEditor();"><span class="icon"></span></a>
		<div class="editor">
			<?php
			$settings = array(
				'textarea_rows' => 55,
				'editor_height' => 260,
			);
			wp_editor( '', 'wpeditorwidget', $settings );
			?>
			<p><a href="javascript:WPEditorWidget.updateWidgetAndCloseEditor(true);" class="button button-primary"><?php _e( 'Save and close', 'vsion' ); ?></a></p>
		</div>
	</div>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'vsion_customize_editor', 1 );

/**
 * Sync frontpage content with customizer control
 *
 * @param string $value New value.
 *
 * @return mixed
 */
function vsion_sync_content_from_control( $value, $old_value = '' ) {
	$frontpage_id = get_option( 'page_on_front' );
	if ( ! empty( $frontpage_id ) && ! empty( $value ) ) {
		if ( ! wp_is_post_revision( $frontpage_id ) ) {

			// update the post, which calls save_post again
			$post = array(
				'ID'           => $frontpage_id,
				'post_content' => wp_kses_post( $value ),
			);

			wp_update_post( $post );

		}
	}

	return $value;
}
add_filter( 'pre_set_theme_mod_vsion_page_editor', 'vsion_sync_content_from_control', 10,2 );


/**
 * Sync page thumbnail and content with customizer control
 */
function vsion_sync_control_from_page() {

	$need_update = get_option( 'vsion_sync_needed' );
	if ( $need_update === false ) {
		return;
	}

	$frontpage_id = get_option( 'page_on_front' );
	if ( empty( $frontpage_id ) ) {
		return;
	}

	$content = get_post_field( 'post_content', $frontpage_id );
	set_theme_mod( 'Vsion_Page_Editor', $content );

	$vsion_frontpage_featured = '';
	if ( has_post_thumbnail( $frontpage_id ) ) {
		$vsion_frontpage_featured = get_the_post_thumbnail_url( $frontpage_id );
	}
	set_theme_mod( 'vsion_feature_thumbnail', $vsion_frontpage_featured );

	update_option( 'vsion_sync_needed', false );

}
add_action( 'after_setup_theme', 'vsion_sync_control_from_page' );


/**
 * Set flag to sync customizer control from page.
 *
 * @param string $post_id Post id.
 */
function vsion_trigger_sync( $post_id ) {
	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	$frontpage_id = get_option( 'page_on_front' );
	if ( empty( $frontpage_id ) ) {
		return;
	}

	if ( intval( $post_id ) === intval( $frontpage_id ) ) {
		update_option( 'vsion_sync_needed' , true );
	};
}
add_action( 'save_post', 'vsion_trigger_sync', 10 );

/**
 * Sync frontpage thumbnail with customizer control
 *
 * @param string $value New value.
 * @param string $old_value Old value.
 *
 * @return mixed
 */
function vsion_sync_thumbnail_from_control( $value, $old_value ) {

	$frontpage_id = get_option( 'page_on_front' );
	if ( ! empty( $frontpage_id ) ) {
		$thumbnail_id = attachment_url_to_postid( $value );
		update_post_meta( $frontpage_id, '_thumbnail_id', $thumbnail_id );
	}

	return $value;
}
add_filter( 'pre_set_theme_mod_vsion_feature_thumbnail', 'vsion_sync_thumbnail_from_control', 10, 2 );



/**
 * Ajax call to sync page content and thumbnail when you switch to static frontpage
 */
function vsion_ajax_call() {
	$pid = $_POST['pid'];

	$return_value = array();

	$content = get_post_field( 'post_content', $pid );
	set_theme_mod( 'Vsion_Page_Editor', $content );

	$vsion_frontpage_featured = '';
	if ( has_post_thumbnail( $pid ) ) {
		$vsion_frontpage_featured = get_the_post_thumbnail_url( $pid );
	}
	set_theme_mod( 'vsion_feature_thumbnail', $vsion_frontpage_featured );

	$return_value['post_content']   = $content;
	$return_value['post_thumbnail'] = $vsion_frontpage_featured;
	echo json_encode( $return_value );

	die();
}
add_action( 'wp_ajax_vsion_ajax_call', 'vsion_ajax_call' );

/**
 * vsion allow all HTML tags in TinyMce editor.
 *
 * @param array $init_array TinyMce settings.
 *
 * @return array
 */
function vsion_override_mce_options( $init_array ) {
	$opts = '*[*]';
	$init_array['valid_elements'] = $opts;
	$init_array['extended_valid_elements'] = $opts;
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'vsion_override_mce_options' );


/**
 * Filters for text format
 */
add_filter( 'vsion_text', 'wptexturize' );
add_filter( 'vsion_text', 'convert_smilies' );
add_filter( 'vsion_text', 'convert_chars' );
add_filter( 'vsion_text', 'wpautop' );
add_filter( 'vsion_text', 'shortcode_unautop' );
add_filter( 'vsion_text', 'do_shortcode' );
