<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); ?>
<section class="top-songs-wrap" style="padding-top:180px;">
	<div class="wrap">
		<div class="eyebrow" style="display:block; color:#aaa;"><?php esc_html_e( 'Okal', 'okal' ); ?></div>
		<h1 style="color:#fff; font-family:'Roboto',sans-serif;"><?php esc_html_e( 'All songs', 'okal' ); ?></h1>
		<?php okal_top_songs_rows( -1 ); ?>
		<div class="btn-row">
			<a href="<?php echo esc_url( okal_page_url( 'music' ) ); ?>" class="btn btn-outline"><?php esc_html_e( '← Back to Music', 'okal' ); ?></a>
		</div>
	</div>
</section>
<?php get_footer(); ?>
