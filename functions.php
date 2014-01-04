<?php

function wp_dynamic_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
		$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
}

	// // Register scripts
	// function cb2014_scripts() {
	// 	wp_enqueue_style( 
	// 		'cb2014-genericons', 
	// 		get_stylesheet_directory_uri() . '/css/genericons.css'
	// 		, array()
	// 		, '3.0.2'
	// 	);
	// }
	// add_action( 'wp_enqueue_scripts', 'cb2014_scripts' );

?>