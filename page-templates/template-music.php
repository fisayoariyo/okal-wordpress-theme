<?php
/**
 * Template Name: Okal — Music
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
	$audience   = get_post_meta( get_the_ID(), '_okal_audience_stat', true );
	$subscribed = get_post_meta( get_the_ID(), '_okal_subscribed_stat', true );
	$has_banner = has_post_thumbnail();
	$total_tracks = wp_count_posts( 'okal_track' );
	$track_count  = isset( $total_tracks->publish ) ? (int) $total_tracks->publish : 0;
?>

<!-- ================= ARTIST HEADER (YouTube Music style) ================= -->
<section class="music-hero <?php echo $has_banner ? '' : 'no-banner'; ?>">
	<?php if ( $has_banner ) : ?>
		<div class="music-hero-bg"><?php the_post_thumbnail( 'okal-wide' ); ?></div>
	<?php endif; ?>
	<div class="music-hero-scrim"></div>
	<div class="wrap music-hero-inner">
		<h1><?php the_title(); ?></h1>
		<?php if ( $audience ) : ?><div class="music-hero-audience"><?php echo esc_html( $audience ); ?></div><?php endif; ?>

		<?php if ( get_the_content() ) : ?>
		<div class="music-hero-bio" data-bio>
			<div class="bio-text"><?php the_content(); ?></div>
			<button type="button" class="bio-toggle" data-bio-toggle><?php esc_html_e( 'More', 'okal' ); ?></button>
		</div>
		<?php endif; ?>

		<div class="music-hero-actions">
			<button type="button" class="pill-btn pill-primary" id="shuffleBtn">
				<span class="ic">&#8646;</span> <?php esc_html_e( 'Shuffle', 'okal' ); ?>
			</button>
			<a href="<?php echo esc_url( get_theme_mod( 'okal_platform_hafrikplay', '#' ) ); ?>" class="pill-btn pill-outline">
				<span class="ic">))</span> <?php esc_html_e( 'Mix', 'okal' ); ?>
			</a>
			<?php if ( $subscribed ) : ?>
				<span class="pill-btn pill-outline pill-static"><?php echo esc_html( $subscribed ); ?></span>
			<?php endif; ?>
			<button type="button" class="hero-kebab" aria-label="<?php esc_attr_e( 'More options', 'okal' ); ?>">&#8942;</button>
		</div>
	</div>
</section>

<!-- ================= TOP SONGS ================= -->
<section id="music" class="top-songs-wrap" style="scroll-margin-top:100px; padding-top:48px; padding-bottom:56px;">
	<div class="wrap">
		<h2 class="top-songs-heading"><?php esc_html_e( 'Top songs', 'okal' ); ?></h2>

		<?php okal_top_songs_rows( 5 ); ?>

		<?php if ( $track_count > 5 ) : ?>
			<div class="btn-row">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'okal_track' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Show all', 'okal' ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- ================= ALBUMS & EPs ================= -->
<section>
	<div class="wrap">
		<div class="sec-head">
			<div><h2><?php esc_html_e( 'Albums & EPs', 'okal' ); ?></h2></div>
		</div>

		<?php
		$releases = new WP_Query( array(
			'post_type'      => 'okal_release',
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );
		if ( $releases->have_posts() ) : ?>
		<div class="rel-grid">
			<?php while ( $releases->have_posts() ) : $releases->the_post();
				$year   = get_post_meta( get_the_ID(), '_okal_year', true );
				$type   = get_post_meta( get_the_ID(), '_okal_type', true );
				$stream = get_post_meta( get_the_ID(), '_okal_stream_url', true );
			?>
			<a class="rel-card" href="<?php echo esc_url( $stream ? $stream : get_permalink() ); ?>">
				<?php okal_photo_slot( get_the_ID(), 'Cover art', 'okal-cover', 'cover' ); ?>
				<div class="rel-body">
					<div class="yr"><?php echo esc_html( trim( $year . ' · ' . $type, ' ·' ) ); ?></div>
					<h4><?php the_title(); ?></h4>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
				</div>
			</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
			<p style="color:var(--fg-dim);"><?php esc_html_e( 'Add your first release under Music Releases in the wp-admin sidebar — it will appear here automatically.', 'okal' ); ?></p>
		<?php endif; ?>

		<?php okal_platform_chips(); ?>
	</div>
</section>
<?php endwhile; get_footer(); ?>
