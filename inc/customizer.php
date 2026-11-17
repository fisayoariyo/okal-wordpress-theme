<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function okal_customize_register( $wp_customize ) {

	/* ---------------- Hero (Home page) ---------------- */
	$wp_customize->add_section( 'okal_hero', array(
		'title'    => __( 'Hero Section (Home)', 'okal' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'okal_hero_eyebrow', array( 'default' => 'Verse 01 — Welcome to the Million Dollar Journey', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'okal_hero_eyebrow', array( 'label' => __( 'Eyebrow label', 'okal' ), 'section' => 'okal_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'okal_hero_headline', array( 'default' => "OKAL is building more than a career. She's building a movement.", 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'okal_hero_headline', array( 'label' => __( 'Headline', 'okal' ), 'section' => 'okal_hero', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'okal_hero_lede', array( 'default' => 'Nigerian artist, songwriter and visionary — known as The Million Dollar Girl — inviting people to believe in their own extraordinary dream through music, resilience and authenticity.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'okal_hero_lede', array( 'label' => __( 'Supporting paragraph', 'okal' ), 'section' => 'okal_hero', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'okal_hero_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'okal_hero_image', array(
		'label'   => __( 'Hero photo', 'okal' ),
		'section' => 'okal_hero',
	) ) );

	/* ---------------- Home teaser sections ---------------- */
	$wp_customize->add_section( 'okal_home_teasers', array(
		'title'    => __( 'Home — Teaser Sections', 'okal' ),
		'priority' => 31,
	) );
	$wp_customize->add_setting( 'okal_dream_teaser', array( 'default' => "The Million Dollar Dream is the belief that every individual carries limitless potential. Success isn't measured only by awards or achievements—it's measured by the lives we inspire and the opportunities we create.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'okal_dream_teaser', array( 'label' => __( '"More Than Music" paragraph', 'okal' ), 'section' => 'okal_home_teasers', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'okal_about_teaser', array( 'default' => 'Rooted in African culture and shaped by lived experiences, OKAL creates music that is honest, soulful and deeply human — blending Afro Soul, Highlife and contemporary African sounds.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'okal_about_teaser', array( 'label' => __( '"The Story Behind OKAL" paragraph', 'okal' ), 'section' => 'okal_home_teasers', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'okal_vision_teaser', array( 'default' => 'OKAL believes creativity has the power to transform lives, strengthen communities and unlock opportunities for future generations — building an ecosystem where African talent can thrive on a global stage.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'okal_vision_teaser', array( 'label' => __( '"Building Beyond the Music" paragraph', 'okal' ), 'section' => 'okal_home_teasers', 'type' => 'textarea' ) );

	/* ---------------- Announcement banner ---------------- */
	$wp_customize->add_section( 'okal_announcement', array(
		'title'    => __( 'Announcement Banner', 'okal' ),
		'priority' => 32,
	) );
	$wp_customize->add_setting( 'okal_announce_enabled', array( 'default' => true, 'sanitize_callback' => 'rest_sanitize_boolean' ) );
	$wp_customize->add_control( 'okal_announce_enabled', array( 'label' => __( 'Show banner', 'okal' ), 'section' => 'okal_announcement', 'type' => 'checkbox' ) );

	$wp_customize->add_setting( 'okal_announce_text', array( 'default' => '✎ New EP "State of Mind: Out of the Verse" — out now on Hafrikplay', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'okal_announce_text', array( 'label' => __( 'Banner text', 'okal' ), 'section' => 'okal_announcement', 'type' => 'text' ) );

	$wp_customize->add_setting( 'okal_announce_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'okal_announce_url', array( 'label' => __( 'Banner link (optional)', 'okal' ), 'section' => 'okal_announcement', 'type' => 'url' ) );

	/* ---------------- Streaming platforms ---------------- */
	$wp_customize->add_section( 'okal_streaming', array(
		'title'    => __( 'Streaming Platforms', 'okal' ),
		'priority' => 34,
	) );
	$platforms = array(
		'hafrikplay'   => 'Hafrikplay (Featured)',
		'spotify'      => 'Spotify',
		'apple_music'  => 'Apple Music',
		'youtube_music'=> 'YouTube Music',
		'audiomack'    => 'Audiomack',
		'boomplay'     => 'Boomplay',
		'deezer'       => 'Deezer',
		'amazon_music' => 'Amazon Music',
		'tidal'        => 'Tidal',
	);
	foreach ( $platforms as $key => $label ) {
		$wp_customize->add_setting( "okal_platform_{$key}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "okal_platform_{$key}", array( 'label' => $label . ' URL', 'section' => 'okal_streaming', 'type' => 'url' ) );
	}

	/* ---------------- Social links ---------------- */
	$wp_customize->add_section( 'okal_social', array(
		'title'    => __( 'Social Links', 'okal' ),
		'priority' => 36,
	) );
	$socials = array(
		'instagram' => 'Instagram URL',
		'tiktok'    => 'TikTok URL',
		'twitter'   => 'X (Twitter) URL',
		'facebook'  => 'Facebook URL',
	);
	foreach ( $socials as $key => $label ) {
		$wp_customize->add_setting( "okal_social_{$key}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "okal_social_{$key}", array( 'label' => $label, 'section' => 'okal_social', 'type' => 'url' ) );
	}

	/* ---------------- Footer & management ---------------- */
	$wp_customize->add_section( 'okal_footer', array(
		'title'    => __( 'Footer & Management Details', 'okal' ),
		'priority' => 38,
	) );
	$wp_customize->add_setting( 'okal_footer_tagline', array( 'default' => 'The Million Dollar Girl — every song is a story, every listener is part of the journey.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'okal_footer_tagline', array( 'label' => __( 'Footer tagline', 'okal' ), 'section' => 'okal_footer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'okal_management_name', array( 'default' => 'MillionDollar Ideas Ltd', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'okal_management_name', array( 'label' => __( 'Management company name', 'okal' ), 'section' => 'okal_footer', 'type' => 'text' ) );

	$wp_customize->add_setting( 'okal_management_email', array( 'default' => 'info@milliondollarideasltd.com', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'okal_management_email', array( 'label' => __( 'Management email', 'okal' ), 'section' => 'okal_footer', 'type' => 'text' ) );
}
add_action( 'customize_register', 'okal_customize_register' );
