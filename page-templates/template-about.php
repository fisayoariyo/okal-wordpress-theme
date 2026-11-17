<?php
/**
 * Template Name: Okal — About
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
?>
<section id="about" style="padding-top:180px;">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'Verse 02 — About', 'okal' ); ?></div>
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="num"><?php esc_html_e( 'Ibadan, Nigeria → The World', 'okal' ); ?></div>
		</div>
		<div class="twocol">
			<?php okal_photo_slot( get_the_ID(), 'Portrait — Okal' ); ?>
			<div class="prose"><?php the_content(); ?></div>
		</div>

		<?php
		$milestones = new WP_Query( array(
			'post_type'      => 'okal_milestone',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		) );
		if ( $milestones->have_posts() ) : ?>
		<div style="margin-top:90px;">
			<div class="eyebrow"><?php esc_html_e( 'Milestones', 'okal' ); ?></div>
			<div class="timeline">
				<?php while ( $milestones->have_posts() ) : $milestones->the_post(); ?>
					<div class="t-item">
						<div class="t-year"><?php echo esc_html( get_post_meta( get_the_ID(), '_okal_year', true ) ); ?></div>
						<div class="t-desc"><?php the_title(); ?></div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>

		<div class="btn-row">
			<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Listen to My Music', 'okal' ); ?></a>
			<a href="<?php echo esc_url( okal_page_url( 'connect' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Contact Okal', 'okal' ); ?></a>
		</div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
