 <?php
global $nr_id;
if( have_books(intval($nr_id)) ) : while ( have_books(intval(nr_id)) ) : the_book();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <!-- <title><?php book_author() ?> | <?php book_title() ?> <?php bloginfo('name'); ?></title> -->
        <title><?php wp_title( '|', true, 'right' ); ?></title>
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
    $romangie_content_class = "col-sm-9 content format-" . get_post_format();
} else {
    $romangie_left_col_class = "col-md-12 indexpage";
    $romangie_right_col_class= "hidden-xs";
    $romangie_content_class = "col-sm-9 col-md-8 content format-" . get_post_format();
}
?>
<div class="row">
        <div class="<?php echo $romangie_left_col_class; ?>">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php $romangie_countComments = wp_count_comments(get_the_ID()); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
                        <div class="col-sm-3 meta info hidden-xs">
                            
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>">
                                <?php echo '<span data-icon="&#xe086;" class="metaicon"></span>'; ?>
                            </a>
                            <hr class="metaline" />
                            <div class="additional-meta">
                                <div class="meta-item"><a href="<?php book_author_permalink() ?>"><span data-icon="&#xe08a;" class="info-icon"></span><?php book_author() ?></a></div>
                                <div class="meta-item"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>"><span data-icon="&#xe023;" class="info-icon"></span><?php echo get_the_date(); ?></a></div>
                                <div class="meta-item"><a href="<?php the_permalink(); ?>#comments" rel="bookmark" title="<?php _e('Go to comment section', 'romangie'); ?>"><span data-icon="&#xe065;" class="info-icon"></span><?php printf( _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'romangie' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></a></div>
                                <?php if ( has_category() ) { ?><div class="meta-item"><?php _e('Categories:', 'romangie' ); ?><?php the_category(); ?></div><?php } ?>
                                <?php if ( has_tag() ) { ?><div class="meta-item"><?php _e('Tags:', 'romangie' ); the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div><?php } ?>
                                <?php edit_post_link(__( 'Edit this entry.', 'romangie') , '<div class="meta-item">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="<?php echo $romangie_content_class; ?>">
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                            <div class="entry"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } the_content('Continue Reading <span class="glyphicon glyphicon-chevron-right"></span>'); ?></div>
                                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'romangie' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>
                        <div class="comments">
                            <?php comments_template( '', true ); ?>
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