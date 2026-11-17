<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register meta boxes.
 */
function okal_add_meta_boxes() {
	add_meta_box( 'okal_release_details', __( 'Release Details', 'okal' ), 'okal_render_release_meta_box', 'okal_release', 'side', 'default' );
	add_meta_box( 'okal_press_details', __( 'Press Link', 'okal' ), 'okal_render_press_meta_box', 'okal_press', 'side', 'default' );
	add_meta_box( 'okal_milestone_details', __( 'Milestone Year', 'okal' ), 'okal_render_milestone_meta_box', 'okal_milestone', 'side', 'default' );
	add_meta_box( 'okal_track_details', __( 'Song Details', 'okal' ), 'okal_render_track_meta_box', 'okal_track', 'side', 'default' );
	add_meta_box( 'okal_artist_header', __( 'Artist Header Stats (Music page only)', 'okal' ), 'okal_render_artist_header_meta_box', 'page', 'side', 'default' );
}
add_action( 'add_meta_boxes', 'okal_add_meta_boxes' );

function okal_render_release_meta_box( $post ) {
	wp_nonce_field( 'okal_save_release_meta', 'okal_release_meta_nonce' );
	$year   = get_post_meta( $post->ID, '_okal_year', true );
	$type   = get_post_meta( $post->ID, '_okal_type', true );
	$stream = get_post_meta( $post->ID, '_okal_stream_url', true );
	?>
	<p>
		<label for="okal_year"><strong><?php esc_html_e( 'Year', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_year" name="okal_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;" placeholder="2026">
	</p>
	<p>
		<label for="okal_type"><strong><?php esc_html_e( 'Type', 'okal' ); ?></strong></label><br>
		<select id="okal_type" name="okal_type" style="width:100%;">
			<option value="EP" <?php selected( $type, 'EP' ); ?>>EP</option>
			<option value="Single" <?php selected( $type, 'Single' ); ?>>Single</option>
			<option value="Album" <?php selected( $type, 'Album' ); ?>>Album</option>
		</select>
	</p>
	<p>
		<label for="okal_stream_url"><strong><?php esc_html_e( 'Hafrikplay / Streaming Link', 'okal' ); ?></strong></label><br>
		<input type="url" id="okal_stream_url" name="okal_stream_url" value="<?php echo esc_attr( $stream ); ?>" style="width:100%;" placeholder="https://hafrikplay.com/...">
	</p>
	<?php
}

function okal_render_press_meta_box( $post ) {
	wp_nonce_field( 'okal_save_press_meta', 'okal_press_meta_nonce' );
	$link = get_post_meta( $post->ID, '_okal_external_url', true );
	?>
	<p>
		<label for="okal_external_url"><strong><?php esc_html_e( 'External Article / Video Link', 'okal' ); ?></strong></label><br>
		<input type="url" id="okal_external_url" name="okal_external_url" value="<?php echo esc_attr( $link ); ?>" style="width:100%;" placeholder="https://...">
	</p>
	<?php
}

function okal_render_milestone_meta_box( $post ) {
	wp_nonce_field( 'okal_save_milestone_meta', 'okal_milestone_meta_nonce' );
	$year = get_post_meta( $post->ID, '_okal_year', true );
	?>
	<p>
		<label for="okal_milestone_year"><strong><?php esc_html_e( 'Year', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_milestone_year" name="okal_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;" placeholder="1997">
	</p>
	<p><em><?php esc_html_e( 'Use the main editor field for the milestone description. Use "Order" (Page Attributes) to control position on the timeline.', 'okal' ); ?></em></p>
	<?php
}

function okal_render_track_meta_box( $post ) {
	wp_nonce_field( 'okal_save_track_meta', 'okal_track_meta_nonce' );
	$album  = get_post_meta( $post->ID, '_okal_track_album', true );
	$plays  = get_post_meta( $post->ID, '_okal_track_plays', true );
	$stream = get_post_meta( $post->ID, '_okal_track_stream_url', true );
	?>
	<p>
		<label for="okal_track_album"><strong><?php esc_html_e( 'Album / EP name', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_track_album" name="okal_track_album" value="<?php echo esc_attr( $album ); ?>" style="width:100%;" placeholder="The Great Commission">
	</p>
	<p>
		<label for="okal_track_plays"><strong><?php esc_html_e( 'Play count (as text)', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_track_plays" name="okal_track_plays" value="<?php echo esc_attr( $plays ); ?>" style="width:100%;" placeholder="16m plays">
	</p>
	<p>
		<label for="okal_track_stream_url"><strong><?php esc_html_e( 'Streaming link', 'okal' ); ?></strong></label><br>
		<input type="url" id="okal_track_stream_url" name="okal_track_stream_url" value="<?php echo esc_attr( $stream ); ?>" style="width:100%;" placeholder="https://hafrikplay.com/...">
	</p>
	<p><em><?php esc_html_e( 'Reorder songs with "Order" below (lower number = higher in the Top Songs list).', 'okal' ); ?></em></p>
	<?php
}

function okal_render_artist_header_meta_box( $post ) {
	wp_nonce_field( 'okal_save_artist_header_meta', 'okal_artist_header_meta_nonce' );
	$audience   = get_post_meta( $post->ID, '_okal_audience_stat', true );
	$subscribed = get_post_meta( $post->ID, '_okal_subscribed_stat', true );
	?>
	<p><em><?php esc_html_e( 'Only used when this page\'s template is "Okal — Music".', 'okal' ); ?></em></p>
	<p>
		<label for="okal_audience_stat"><strong><?php esc_html_e( 'Monthly audience stat', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_audience_stat" name="okal_audience_stat" value="<?php echo esc_attr( $audience ); ?>" style="width:100%;" placeholder="2.8m monthly listeners">
	</p>
	<p>
		<label for="okal_subscribed_stat"><strong><?php esc_html_e( 'Followers / subscribed stat', 'okal' ); ?></strong></label><br>
		<input type="text" id="okal_subscribed_stat" name="okal_subscribed_stat" value="<?php echo esc_attr( $subscribed ); ?>" style="width:100%;" placeholder="1.5m subscribed">
	</p>
	<p><em><?php esc_html_e( 'Set the artist banner photo using the Featured Image box below.', 'okal' ); ?></em></p>
	<?php
}

/**
 * Save meta box values.
 */
function okal_save_meta_boxes( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( isset( $_POST['okal_release_meta_nonce'] ) && wp_verify_nonce( $_POST['okal_release_meta_nonce'], 'okal_save_release_meta' ) ) {
		if ( isset( $_POST['okal_year'] ) ) update_post_meta( $post_id, '_okal_year', sanitize_text_field( $_POST['okal_year'] ) );
		if ( isset( $_POST['okal_type'] ) ) update_post_meta( $post_id, '_okal_type', sanitize_text_field( $_POST['okal_type'] ) );
		if ( isset( $_POST['okal_stream_url'] ) ) update_post_meta( $post_id, '_okal_stream_url', esc_url_raw( $_POST['okal_stream_url'] ) );
	}

	if ( isset( $_POST['okal_press_meta_nonce'] ) && wp_verify_nonce( $_POST['okal_press_meta_nonce'], 'okal_save_press_meta' ) ) {
		if ( isset( $_POST['okal_external_url'] ) ) update_post_meta( $post_id, '_okal_external_url', esc_url_raw( $_POST['okal_external_url'] ) );
	}

	if ( isset( $_POST['okal_milestone_meta_nonce'] ) && wp_verify_nonce( $_POST['okal_milestone_meta_nonce'], 'okal_save_milestone_meta' ) ) {
		if ( isset( $_POST['okal_year'] ) ) update_post_meta( $post_id, '_okal_year', sanitize_text_field( $_POST['okal_year'] ) );
	}

	if ( isset( $_POST['okal_track_meta_nonce'] ) && wp_verify_nonce( $_POST['okal_track_meta_nonce'], 'okal_save_track_meta' ) ) {
		if ( isset( $_POST['okal_track_album'] ) ) update_post_meta( $post_id, '_okal_track_album', sanitize_text_field( $_POST['okal_track_album'] ) );
		if ( isset( $_POST['okal_track_plays'] ) ) update_post_meta( $post_id, '_okal_track_plays', sanitize_text_field( $_POST['okal_track_plays'] ) );
		if ( isset( $_POST['okal_track_stream_url'] ) ) update_post_meta( $post_id, '_okal_track_stream_url', esc_url_raw( $_POST['okal_track_stream_url'] ) );
	}

	if ( isset( $_POST['okal_artist_header_meta_nonce'] ) && wp_verify_nonce( $_POST['okal_artist_header_meta_nonce'], 'okal_save_artist_header_meta' ) ) {
		if ( isset( $_POST['okal_audience_stat'] ) ) update_post_meta( $post_id, '_okal_audience_stat', sanitize_text_field( $_POST['okal_audience_stat'] ) );
		if ( isset( $_POST['okal_subscribed_stat'] ) ) update_post_meta( $post_id, '_okal_subscribed_stat', sanitize_text_field( $_POST['okal_subscribed_stat'] ) );
	}
}
add_action( 'save_post', 'okal_save_meta_boxes' );
