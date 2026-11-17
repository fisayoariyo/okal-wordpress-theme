<?php
/**
 * Template Name: Okal — Media
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
?>
<section id="media" style="padding-top:180px;">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'Verse 05 — Media', 'okal' ); ?></div>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>

		<div class="prose" style="max-width:60ch; color:var(--fg-dim);"><?php the_content(); ?></div>

		<?php
		$press = new WP_Query( array( 'post_type' => 'okal_press', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC' ) );
		if ( $press->have_posts() ) : ?>
		<div class="press-grid">
			<?php while ( $press->have_posts() ) : $press->the_post();
				$link = get_post_meta( get_the_ID(), '_okal_external_url', true );
			?>
			<a class="press-item" href="<?php echo esc_url( $link ? $link : get_permalink() ); ?>" <?php echo $link ? 'target="_blank" rel="noopener"' : ''; ?>>
				<?php the_title(); ?>
			</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
			<p style="color:var(--fg-dim);"><?php esc_html_e( 'Add press features under Press & Media in the wp-admin sidebar.', 'okal' ); ?></p>
		<?php endif; ?>

		<div class="btn-row">
			<a href="<?php echo esc_url( okal_page_url( 'connect' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Booking Enquiries', 'okal' ); ?></a>
			<a href="<?php echo esc_url( okal_page_url( 'connect' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Contact Okal', 'okal' ); ?></a>
		</div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
