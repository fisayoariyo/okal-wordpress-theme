<?php
/**
 * Template Name: Okal — Vision
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
?>
<section id="vision" style="padding-top:180px;">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'Verse 04 — Vision', 'okal' ); ?></div>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>

		<div class="prose" style="max-width:64ch; font-size:18px; color:var(--fg-dim);"><?php the_content(); ?></div>

		<div class="pillars">
			<div class="pillar">
				<div class="pnum"><?php esc_html_e( 'The Million Dollar Girl', 'okal' ); ?></div>
				<h4><?php esc_html_e( 'More than a name', 'okal' ); ?></h4>
				<p><?php esc_html_e( '"Million dollar" represents value — believing your dreams matter, your gifts have purpose and your story is worth telling.', 'okal' ); ?></p>
			</div>
			<div class="pillar">
				<div class="pnum"><?php esc_html_e( 'The Million Dollar Dream', 'okal' ); ?></div>
				<h4><?php esc_html_e( 'Dream without limits', 'okal' ); ?></h4>
				<p><?php esc_html_e( "The dream that keeps you awake at night — the idea you can't stop thinking about. It belongs to everyone.", 'okal' ); ?></p>
			</div>
			<div class="pillar">
				<div class="pnum"><?php esc_html_e( 'Building Beyond Music', 'okal' ); ?></div>
				<h4><?php esc_html_e( 'Creating opportunities', 'okal' ); ?></h4>
				<p><?php esc_html_e( 'Supporting ideas and platforms — like Hafrikplay — that help African creatives reach new audiences and build sustainable careers.', 'okal' ); ?></p>
			</div>
		</div>

		<div class="btn-row">
			<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Listen to My Music', 'okal' ); ?></a>
			<a href="<?php echo esc_url( okal_page_url( 'media' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Explore Media', 'okal' ); ?></a>
			<a href="<?php echo esc_url( okal_page_url( 'connect' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Get in Touch', 'okal' ); ?></a>
		</div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
