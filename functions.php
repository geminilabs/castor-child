<?php

// 1. load child functions.php first
// 2. load parent functions.php next

/**
 * Check if the page has existing Builder data
 *
 * @param null|int $postId
 *
 * @return bool
 */
function has_builder_data( $postId = null )
{
	!empty( $postId ) || $postId = get_the_ID();
	return !empty( get_post_meta( $postId, 'builder_data', true ))
		? true
		: false;
}

/**
 * Check if the Builder is active on the page
 *
 * @param null|int $postId
 *
 * @return bool
 */
function is_builder_page( $postId = null )
{
	!empty( $postId ) || $postId = get_the_ID();
	return get_post_meta( $postId, 'builder_toggle', true ) == 'on'
		? true
		: false;
}

/**
 * Check if a sidebar has widgets
 *
 * @param string $sidebar
 *
 * @return bool
 */
function is_sidebar_active( $sidebar )
{
	$widgets = wp_get_sidebars_widgets();
	return !empty( $widgets[$sidebar] )
		? true
		: false;
}

/**
 * Login page logo
 */

add_filter( 'login_headerurl', function() {
	return get_bloginfo( 'url' );
});

add_filter( 'login_headertitle', function() {
	return get_bloginfo( 'name' );
});

add_action( 'login_head', function() {
	printf( '<style>.login h1 a {height:64px;margin-top:-64px;background-size:64px;background-color:#272628;background-position:center;background-image:url(%s);}</style>',
		Theme::imageUri( 'logo_2x.png' )
	);
});
