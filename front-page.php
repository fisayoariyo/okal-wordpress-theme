<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); ?>

<section id="home" style="border-bottom:1px solid var(--line);">
	<div class="wrap hero-grid" id="home-hero">
		<div class="hero">
			<div class="tag"><?php echo esc_html( get_theme_mod( 'okal_hero_eyebrow' ) ); ?></div>
			<h1><?php echo esc_html( get_theme_mod( 'okal_hero_headline' ) ); ?></h1>
			<p class="lede"><?php echo esc_html( get_theme_mod( 'okal_hero_lede' ) ); ?></p>
			<div class="btn-row">
				<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Listen Now', 'okal' ); ?></a>
				<a href="<?php echo esc_url( okal_page_url( 'vision' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Explore My Journey', 'okal' ); ?></a>
			</div>
		</div>
		<?php
		$hero_img = get_theme_mod( 'okal_hero_image', '' );
		echo '<div class="photo-slot">';
		if ( $hero_img ) {
			echo '<img src="' . esc_url( $hero_img ) . '" alt="Okal">';
		} else {
			echo '<span class="ph-label">Hero photo — Okal</span>';
		}
		echo '</div>';
		?>
	</div>
</section>

<section>
	<div class="wrap">
		<div class="eyebrow"><?php esc_html_e( 'More Than Music', 'okal' ); ?></div>
		<h2 style="max-width:20ch;"><?php esc_html_e( 'The Million Dollar Dream', 'okal' ); ?></h2>
		<p style="max-width:64ch; font-size:17px; color:var(--fg-dim);"><?php echo esc_html( get_theme_mod( 'okal_dream_teaser' ) ); ?></p>
		<div class="btn-row"><a href="<?php echo esc_url( okal_page_url( 'vision' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Discover the Journey', 'okal' ); ?></a></div>
	</div>
</section>

<section>
	<div class="wrap twocol">
		<?php okal_photo_slot( null, 'Portrait — Okal' ); ?>
		<div>
			<div class="eyebrow"><?php esc_html_e( 'The Story Behind OKAL', 'okal' ); ?></div>
			<h2><?php esc_html_e( 'Rooted in culture. Shaped by experience.', 'okal' ); ?></h2>
			<p style="font-size:16px; color:var(--fg-dim);"><?php echo esc_html( get_theme_mod( 'okal_about_teaser' ) ); ?></p>
			<div class="btn-row"><a href="<?php echo esc_url( okal_page_url( 'about' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Read My Story', 'okal' ); ?></a></div>
		</div>
	</div>
</section>

<section>
	<div class="wrap">
		<div class="eyebrow"><?php esc_html_e( 'Building Beyond the Music', 'okal' ); ?></div>
		<h2 style="max-width:20ch;"><?php esc_html_e( 'Building an ecosystem for African talent', 'okal' ); ?></h2>
		<p style="max-width:64ch; font-size:17px; color:var(--fg-dim);"><?php echo esc_html( get_theme_mod( 'okal_vision_teaser' ) ); ?></p>
		<div class="btn-row"><a href="<?php echo esc_url( okal_page_url( 'vision' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Explore the Vision', 'okal' ); ?></a></div>
	</div>
</section>

<?php
$latest_release = new WP_Query( array( 'post_type' => 'okal_release', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' ) );
if ( $latest_release->have_posts() ) : $latest_release->the_post(); ?>
<section id="music" style="scroll-margin-top:100px;">
	<div class="wrap">
		<div class="eyebrow"><?php esc_html_e( 'Latest Release', 'okal' ); ?></div>
		<div class="rel-grid" style="grid-template-columns:0.7fr 1.3fr;">
			<?php okal_photo_slot( get_the_ID(), 'Cover art', 'okal-cover', 'cover' ); ?>
			<div>
				<h2><?php the_title(); ?></h2>
				<div class="prose"><?php the_excerpt(); ?></div>
				<?php $stream = get_post_meta( get_the_ID(), '_okal_stream_url', true ); ?>
				<div class="btn-row">
					<a href="<?php echo esc_url( $stream ? $stream : '#' ); ?>" class="btn btn-primary"><?php esc_html_e( 'Listen on Hafrikplay', 'okal' ); ?></a>
					<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'View Discography', 'okal' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); endif; ?>

<section id="connect" style="scroll-margin-top:100px;">
	<div class="wrap">
		<div class="eyebrow"><?php esc_html_e( 'Join the Journey', 'okal' ); ?></div>
		<h2><?php esc_html_e( 'Become part of the journey', 'okal' ); ?></h2>
		<p style="max-width:60ch; color:var(--fg-dim);"><?php esc_html_e( 'Receive new music, exclusive stories, behind-the-scenes moments and updates as the Million Dollar Journey continues.', 'okal' ); ?></p>
		<form class="subscribe" method="post" action="">
			<input type="email" name="okal_subscribe_email" placeholder="Your email address" required>
			<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Join My Community', 'okal' ); ?></button>
		</form>
		<p style="font-size:12px; color:var(--fg-dim); margin-top:10px;"><?php esc_html_e( 'Connect this form to your email platform (Mailchimp, Brevo, etc.) via their WordPress plugin or embed code.', 'okal' ); ?></p>
	</div>
</section>

<?php get_footer(); ?>
