<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); ?>

<section style="padding-top:180px;">
	<div class="wrap">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> style="margin-bottom:60px;">
				<h2><a href="<?php the_permalink(); ?>" style="text-decoration:none;"><?php the_title(); ?></a></h2>
				<div class="prose"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'okal' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
