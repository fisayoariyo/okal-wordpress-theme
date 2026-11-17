<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); while ( have_posts() ) : the_post();
	$link = get_post_meta( get_the_ID(), '_okal_external_url', true );
?>
<section style="padding-top:180px;">
	<div class="wrap">
		<h1 style="max-width:24ch;"><?php the_title(); ?></h1>
		<div class="prose" style="max-width:70ch;"><?php the_content(); ?></div>
		<?php if ( $link ) : ?>
			<div class="btn-row"><a href="<?php echo esc_url( $link ); ?>" class="btn btn-primary" target="_blank" rel="noopener"><?php esc_html_e( 'View Original Feature', 'okal' ); ?></a></div>
		<?php endif; ?>
	</div>
</section>
<?php endwhile; get_footer(); ?>
