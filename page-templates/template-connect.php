<?php
/**
 * Template Name: Okal — Connect
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
?>
<section id="connect" style="padding-top:180px;">
	<div class="wrap">
		<div class="sec-head">
			<div>
				<div class="eyebrow"><?php esc_html_e( 'Verse 07 — Connect', 'okal' ); ?></div>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="contact-grid">
			<div>
				<div class="prose"><?php the_content(); ?></div>
				<div class="contact-detail">
					<div class="lbl"><?php esc_html_e( 'Management', 'okal' ); ?></div>
					<div><?php echo esc_html( get_theme_mod( 'okal_management_name' ) ); ?> — <?php echo esc_html( get_theme_mod( 'okal_management_email' ) ); ?></div>
				</div>
				<div class="enquiry-cards">
					<div class="enq"><?php esc_html_e( 'Bookings & Festivals', 'okal' ); ?></div>
					<div class="enq"><?php esc_html_e( 'Brand Partnerships', 'okal' ); ?></div>
					<div class="enq"><?php esc_html_e( 'Press & Media', 'okal' ); ?></div>
					<div class="enq"><?php esc_html_e( 'Licensing & Publishing', 'okal' ); ?></div>
				</div>
			</div>
			<div>
				<div class="lbl" style="font-family:var(--font-mono); font-size:11px; letter-spacing:.08em; color:var(--brass); text-transform:uppercase; margin-bottom:10px;"><?php esc_html_e( 'Join the journey', 'okal' ); ?></div>
				<p style="color:var(--fg-dim); font-size:15px;"><?php esc_html_e( 'Receive new music, exclusive stories and behind-the-scenes moments as the Million Dollar Journey continues.', 'okal' ); ?></p>
				<form class="subscribe" method="post" action="">
					<input type="email" name="okal_subscribe_email" placeholder="Your email address" required>
					<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Join', 'okal' ); ?></button>
				</form>
				<p style="font-size:12px; color:var(--fg-dim); margin-top:20px;"><?php esc_html_e( 'Replace this form with your contact-form plugin (e.g. Contact Form 7 or WPForms) shortcode for real email delivery and spam protection.', 'okal' ); ?></p>
			</div>
		</div>
	</div>
</section>
<?php endwhile; get_footer(); ?>
