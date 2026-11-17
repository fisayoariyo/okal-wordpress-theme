<?php if ( ! defined( 'ABSPATH' ) ) exit; get_header(); while ( have_posts() ) : the_post(); ?>
<section style="padding-top:180px;">
	<div class="wrap">
		<h1><?php the_title(); ?></h1>
		<?php if ( has_post_thumbnail() ) : ?>
			<div style="margin:30px 0;"><?php okal_photo_slot( get_the_ID(), get_the_title(), 'okal-wide', 'wide' ); ?></div>
		<?php endif; ?>
		<div class="prose"><?php the_content(); ?></div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
