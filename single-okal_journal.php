<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); while ( have_posts() ) : the_post();
	$terms = get_the_terms( get_the_ID(), 'okal_journal_category' );
	$cat   = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : get_the_date();
?>
<section style="padding-top:180px;">
	<div class="wrap">
		<div class="eyebrow"><?php echo esc_html( $cat ); ?> · <?php echo esc_html( get_the_date() ); ?></div>
		<h1 style="max-width:20ch;"><?php the_title(); ?></h1>
		<?php okal_photo_slot( get_the_ID(), 'Journal photo', 'okal-wide', 'wide' ); ?>
		<div class="prose" style="max-width:70ch; margin-top:40px; font-size:17px;"><?php the_content(); ?></div>
		<div class="btn-row"><a href="<?php echo esc_url( okal_page_url( 'journey' ) ); ?>" class="btn btn-outline"><?php esc_html_e( '← Back to the Journey', 'okal' ); ?></a></div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
