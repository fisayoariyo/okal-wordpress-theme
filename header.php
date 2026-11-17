<?php if ( ! defined( 'ABSPATH' ) ) exit; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( get_theme_mod( 'okal_announce_enabled', true ) ) :
	$announce_text = get_theme_mod( 'okal_announce_text', '' );
	$announce_url  = get_theme_mod( 'okal_announce_url', '' );
	if ( $announce_text ) : ?>
<div id="announce">
	<?php if ( $announce_url ) : ?>
		<a href="<?php echo esc_url( $announce_url ); ?>" style="text-decoration:none; color:inherit;"><?php echo esc_html( $announce_text ); ?></a>
	<?php else : ?>
		<?php echo esc_html( $announce_text ); ?>
	<?php endif; ?>
	<button onclick="this.parentElement.style.display='none'">✕</button>
</div>
<?php endif; endif; ?>

<header id="topbar">
	<a class="wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>">OKAL<span>.</span></a>
	<nav>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => '',
			'fallback_cb'    => 'okal_default_menu',
		) );
		?>
	</nav>
	<button id="menuToggle" aria-label="<?php esc_attr_e( 'Open menu', 'okal' ); ?>">☰</button>
</header>

<div id="mobileMenu">
	<button id="closeMenu" aria-label="<?php esc_attr_e( 'Close menu', 'okal' ); ?>">✕</button>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => false,
		'menu_id'        => 'mobileMenuList',
		'fallback_cb'    => 'okal_default_menu',
	) );
	?>
</div>

<nav id="versenav">
	<a href="#home" data-label="VERSE 01 — HOME" class="active"></a>
	<a href="#about" data-label="VERSE 02 — ABOUT"></a>
	<a href="#music" data-label="VERSE 03 — MUSIC"></a>
	<a href="#vision" data-label="VERSE 04 — VISION"></a>
	<a href="#media" data-label="VERSE 05 — MEDIA"></a>
	<a href="#journey" data-label="VERSE 06 — JOURNEY"></a>
	<a href="#connect" data-label="VERSE 07 — CONNECT"></a>
</nav>

<?php
/**
 * Fallback menu if no menu has been assigned yet in Appearance → Menus.
 */
function okal_default_menu() {
	echo '<ul>';
	$pages = array(
		'about'   => 'About',
		'music'   => 'Music',
		'vision'  => 'Vision',
		'media'   => 'Media',
		'journey' => 'Journey',
		'connect' => 'Connect',
	);
	foreach ( $pages as $slug => $label ) {
		$page = get_page_by_path( $slug );
		$url  = $page ? get_permalink( $page ) : home_url( '/' . $slug );
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}
?>
