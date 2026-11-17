<?php
/**
 * Template Name: Okal — Journey
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
?>
<section id="journey" style="padding-top:180px;">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'Verse 06 — The Million Dollar Journey', 'okal' ); ?></div>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>

		<div class="prose" style="max-width:62ch; color:var(--fg-dim); font-size:16px;"><?php the_content(); ?></div>

		<?php
		$journal = new WP_Query( array( 'post_type' => 'okal_journal', 'posts_per_page' => 9, 'orderby' => 'date', 'order' => 'DESC' ) );
		if ( $journal->have_posts() ) : ?>
		<div class="journal-grid" style="margin-top:44px;">
			<?php while ( $journal->have_posts() ) : $journal->the_post();
				$terms = get_the_terms( get_the_ID(), 'okal_journal_category' );
				$cat   = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : get_the_date();
			?>
			<a class="journal-card" href="<?php the_permalink(); ?>">
				<?php okal_photo_slot( get_the_ID(), 'Journal photo', 'okal-wide', 'thumb' ); ?>
				<div class="jb">
					<div class="jdate"><?php echo esc_html( $cat ); ?></div>
					<h4><?php the_title(); ?></h4>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
				</div>
			</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
			<p style="color:var(--fg-dim);"><?php esc_html_e( 'Add your first entry under The Journey in the wp-admin sidebar.', 'okal' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php endwhile; get_footer(); ?>
