<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); while ( have_posts() ) : the_post();
	$year   = get_post_meta( get_the_ID(), '_okal_year', true );
	$type   = get_post_meta( get_the_ID(), '_okal_type', true );
	$stream = get_post_meta( get_the_ID(), '_okal_stream_url', true );
?>
<section style="padding-top:180px;">
	<div class="wrap twocol">
		<?php okal_photo_slot( get_the_ID(), 'Cover art', 'okal-cover' ); ?>
		<div>
			<div class="eyebrow"><?php echo esc_html( trim( $year . ' · ' . $type, ' ·' ) ); ?></div>
			<h1><?php the_title(); ?></h1>
			<div class="prose"><?php the_content(); ?></div>
			<div class="btn-row">
				<a href="<?php echo esc_url( $stream ? $stream : '#' ); ?>" class="btn btn-primary"><?php esc_html_e( 'Listen on Hafrikplay', 'okal' ); ?></a>
				<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Back to Discography', 'okal' ); ?></a>
			</div>
			<?php okal_platform_chips(); ?>
		</div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
