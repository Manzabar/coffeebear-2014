<?php
// Returns a dynamic copyright notice with the years of the first and last
// post.
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
		$copyright .= ' &ndash; ' . $copyright_dates[0]->lastdate;
	}
    $copyright .= ' <a href="' . get_bloginfo('url') .'" title="' . get_bloginfo('description') .' | ' . get_bloginfo('name') .'">' . get_bloginfo('name') .'</a>';
	$output = $copyright;
	}
	return $output;
}

// Custom function for use with the Now-Reading (Now-Reading Reloaded) to 
// print a list of tags associates with a specific book
function cb2014_print_book_tags( $echo = true ) {
    global $book;

    $tags = get_book_tags($book->id);

    if ( count($tags) < 1 )
        return;

    $i = 0;
    $string = '';
    foreach ( (array) $tags as $tag ) {
        if ( $i++ != 0 )
            $string .= ', ';
        $link = book_tag_url($tag, 0);
        $string .= "<li><a href='$link' rel='tag'>$tag</a></li>";
    }

    if ( $echo )
        echo $string;
    return $string;
}
?>