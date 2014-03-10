<?php
global $nr_id;
if( have_books(intval($nr_id)) ) : while ( have_books(intval(nr_id)) ) : the_book();
    global $book;
    $user_info = get_userdata($book->reader);
    $readerID = $book->reader;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( ); ?>>
        <div class="container">
            <div class="header row" id="header" role="banner">
                <header>
                    <div class="site-branding">
                        <h1 id="site-title">
                            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                        </h1>
                        <h2 id="site-description"><?php bloginfo('description'); ?></h2>
                    </div>
                </header>

                <div class="navi-wrap">
                        <?php $romangie_defaults = array(
                            'theme_location' => 'header-menu',
                            'container' => 'ol',
                            'menu_class' => 'flexnav'
                            );
                        
                        wp_nav_menu($romangie_defaults); ?>
                </div> <!-- /navi-wrap -->
                <br class="clear" />
            </div> <!-- /header -->
<?php if ( is_active_sidebar( 'primary' ) ) {
    $romangie_left_col_class = "col-md-9 indexpage";
    $romangie_right_col_class= "col-md-3 visible-lg visible-md";
    $romangie_content_class = "col-sm-9 content format-standard";
} else {
    $romangie_left_col_class = "col-md-12 indexpage";
    $romangie_right_col_class= "hidden-xs";
    $romangie_content_class = "col-sm-9 col-md-8 content format-standard";
}
?>
<div class="row">
        <div class="<?php echo $romangie_left_col_class; ?>">
                <?php $romangie_countComments = wp_count_comments(get_the_ID()); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
                        <div class="col-sm-3 meta info hidden-xs">
                            
                            <a href="<?php book_post_url(); ?>" rel="bookmark" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><span data-icon="&#xe086;" class="metaicon"></span>
                            </a>
                            <hr class="metaline" />
                            <div class="additional-meta">
                                <div class="meta-item"><span data-icon="&#xe08a;" class="info-icon"></span>Read by <a class="url fn" href="<?php echo $user_info->user_url; ?>"><?php echo $user_info->display_name; ?></a></div>
                                <div class="meta-item"><span data-icon="&#xe023;" class="info-icon"></span>Started: <?php book_started() ?></div>
                                <?php if ( book_finished(false) != 'Not yet finished.') { $book_finished_date = strtotime(book_finished(false)) ?><div class="meta-item"><span data-icon="&#xe023;" class="info-icon"></span>Finished: <?php book_finished() ?></div><?php } ?>
                                <?php if( book_has_post() ) { ?><div class="meta-item"><a href="<?php book_post_url() ?>"><span data-icon="&#xe065;" class="info-icon"></span><?php book_post_title() ?></a></div><?php } ?>
                                <div class="meta-item"><span data-icon="&#xe018;" class="info-icon"></span><ul><?php print_book_tags(1) ?></ul></div>
                                <?php if( can_now_reading_admin() ) { ?>
                                    <div class="meta-item"><a href="<?php book_edit_url() ?>">Edit this book</a></div>
                                    <div class="meta-item"><a href="<?php manage_library_url() ?>">Manage Books</a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="<?php echo $romangie_content_class; ?>">
                            <h2 class="entry-title"><?php book_title(); ?></h2>
                            <h3 class="entry-author"> by <a href="<?php book_author_permalink() ?>"><?php book_author() ?></a></h3>
                            <div class="entry"><p><a class="url" href="<?php book_url() ?>" title="Buy <?php book_title() ?> from Amazon.com"><img class="photo book-cover alignleft" src="<?php book_image() ?>" alt="<?php book_title() ?>" /></a></p></div>
                            <?php
                            // Print the rating score
                            if (book_rating(false) == "Unrated") { ?>Unrated
                            <?php } else {
                            $rating = floor(book_rating(false)/2);
                            $num = 0;
                                while ($num < $rating)
                                {
                                    $num++;
                                    echo '<span data-icon="&#xe033;" class="metaicon nw-rating"></span>';
                                    }
                            }
                            if ((book_rating(false) % 2) == 1) {
                                echo '<span data-icon="&#xe034;" class="metaicon nw-rating"></span>';
                            } ?>
                            <p><span data-icon="&#xe015;" class="info-icon"></span><a class="url" href="<?php book_url() ?>" title="Buy <?php book_title() ?> from Amazon.com">Buy <?php book_title() ?> from Amazon.com</a></p>
                            <?php
                            // Print any comments by the book's reviewer
                            $review = $book->review;
                            if (!empty($review)) { book_review(); }
                            ?>
                        </div>
                     </div>
            <?php endwhile; ?>
            <?php else : ?>

                <h2>Not Found</h2>

            <?php endif; ?>
        </div>

        <div class="<?php echo $romangie_right_col_class; ?>">
            <?php get_sidebar('primary'); ?>
        </div>
</div>
<?php get_footer(); ?>