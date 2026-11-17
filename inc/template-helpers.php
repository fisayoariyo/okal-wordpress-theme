<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Resolve a page's URL by slug (about, music, vision, media, journey, connect),
 * falling back to a pretty-permalink guess if the page hasn't been created yet.
 */
function okal_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/**
 * Render a YouTube-Music-style "Top songs" row list.
 * $limit = -1 for all songs (used on the archive "Show all" page).
 */
function okal_top_songs_rows( $limit = 5 ) {
	$tracks = new WP_Query( array(
		'post_type'      => 'okal_track',
		'posts_per_page' => $limit,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	) );
	if ( ! $tracks->have_posts() ) {
		echo '<p style="color:var(--fg-dim);">' . esc_html__( 'Add songs under Top Songs in the wp-admin sidebar — they\'ll be ranked here in the order you set.', 'okal' ) . '</p>';
		return;
	}
	echo '<div class="top-songs">';
	while ( $tracks->have_posts() ) : $tracks->the_post();
		$album  = get_post_meta( get_the_ID(), '_okal_track_album', true );
		$plays  = get_post_meta( get_the_ID(), '_okal_track_plays', true );
		$stream = get_post_meta( get_the_ID(), '_okal_track_stream_url', true );
		?>
		<a class="song-row" href="<?php echo esc_url( $stream ? $stream : '#' ); ?>">
			<span class="song-thumb">
				<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'thumbnail' ); else : ?>
					<span class="song-thumb-ph"></span>
				<?php endif; ?>
			</span>
			<span class="song-main">
				<span class="song-title"><?php the_title(); ?></span>
				<span class="song-sub">
					<span class="song-artist"><?php esc_html_e( 'Okal', 'okal' ); ?></span><?php if ( $plays ) : ?><span class="song-plays"><?php echo esc_html( $plays ); ?></span><?php endif; ?><?php if ( $album ) : ?><span class="song-album"><?php echo esc_html( $album ); ?></span><?php endif; ?>
				</span>
			</span>
			<span class="song-artist-col"><?php esc_html_e( 'Okal', 'okal' ); ?></span>
			<span class="song-plays-col"><?php echo esc_html( $plays ); ?></span>
			<span class="song-album-col"><?php echo esc_html( $album ); ?></span>
			<span class="song-more">&#8942;</span>
		</a>
	<?php
	endwhile;
	wp_reset_postdata();
	echo '</div>';
}

/**
 * Output a featured image inside a .photo-slot wrapper, or a styled
 * placeholder (with label) if no image has been uploaded yet.
 */
function okal_photo_slot( $post_id = null, $label = 'Photo', $size = 'okal-portrait', $extra_class = '' ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$has_img = $post_id && has_post_thumbnail( $post_id );
	echo '<div class="photo-slot ' . esc_attr( $extra_class ) . '">';
	if ( $has_img ) {
		echo get_the_post_thumbnail( $post_id, $size, array( 'alt' => esc_attr( $label ) ) );
	} else {
		echo '<span class="ph-label">' . esc_html( $label ) . '</span>';
	}
	echo '</div>';
}

/**
 * Render the streaming platform chip row. Hafrikplay is always featured first.
 */
function okal_platform_chips() {
	$platforms = array(
		'hafrikplay'    => 'Hafrikplay',
		'spotify'       => 'Spotify',
		'apple_music'   => 'Apple Music',
		'youtube_music' => 'YouTube Music',
		'audiomack'     => 'Audiomack',
		'boomplay'      => 'Boomplay',
		'deezer'        => 'Deezer',
		'amazon_music'  => 'Amazon Music',
		'tidal'         => 'Tidal',
	);
	echo '<div class="platform-row">';
	foreach ( $platforms as $key => $label ) {
		$url  = get_theme_mod( "okal_platform_{$key}", '' );
		$href = $url ? $url : '#';
		$cls  = 'plat-chip' . ( 'hafrikplay' === $key ? ' featured' : '' );
		echo '<a class="' . esc_attr( $cls ) . '" href="' . esc_url( $href ) . '">' . esc_html( $label ) . '</a>';
	}
	echo '</div>';
}

/**
 * Render social icons/links in the footer, skipping any left empty.
 */
function okal_social_links() {
	$socials = array(
		'instagram' => 'Instagram',
		'tiktok'    => 'TikTok',
		'twitter'   => 'X (Twitter)',
		'facebook'  => 'Facebook',
	);
	foreach ( $socials as $key => $label ) {
		$url = get_theme_mod( "okal_social_{$key}", '' );
		if ( $url ) {
			echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener">' . esc_html( $label ) . '</a>';
		}
	}
}
