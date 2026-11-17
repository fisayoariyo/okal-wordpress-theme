<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<footer id="colophon">
	<div class="wrap">
		<div class="foot-grid">
			<div>
				<a class="wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>">OKAL<span>.</span></a>
				<p style="color:var(--fg-dim); font-size:14px; max-width:38ch; margin-top:14px;">
					<?php echo esc_html( get_theme_mod( 'okal_footer_tagline', 'The Million Dollar Girl.' ) ); ?>
				</p>
			</div>
			<div>
				<h5><?php esc_html_e( 'Follow', 'okal' ); ?></h5>
				<?php okal_social_links(); ?>
			</div>
			<div>
				<h5><?php esc_html_e( 'Site', 'okal' ); ?></h5>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => '',
					'fallback_cb'    => 'okal_default_menu',
				) );
				?>
			</div>
		</div>
		<div class="fine">
			<span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Okal &middot; <?php echo esc_html( get_theme_mod( 'okal_management_name', 'MillionDollar Ideas Ltd' ) ); ?></span>
			<span><?php echo esc_html( preg_replace( '#^https?://#', '', home_url() ) ); ?></span>
		</div>
	</div>
</footer>

<div id="player">
	<button id="playBtn" aria-label="<?php esc_attr_e( 'Preview player', 'okal' ); ?>">▶</button>
	<div class="meta"><div class="tt"><?php esc_html_e( 'Clock — Okal', 'okal' ); ?></div><div class="tt2"><?php esc_html_e( 'Preview player · Hafrikplay', 'okal' ); ?></div></div>
</div>

<?php wp_footer(); ?>
</body>
</html>
