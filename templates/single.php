<?php
/**
 * Single book template for the Now Reading Redux plugin.
 */

get_header();
global $nr_id, $nr_single_added_show, $nr_single_added_text, $nr_single_started_show, $nr_single_started_text, $nr_single_finished_show, $nr_single_finished_text, $nr_single_meta_show;
?>
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

					<div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
						<div class="col-sm-3 meta info hidden-xs">
							
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>"></a>
							<hr class="metaline" />
							<div class="additional-meta">
								<div class="meta-item"><a href="<?php book_author_permalink() ?>"><?php echo '<span data-icon="&#xe022;" class="metaicon"></span>'; ?><?php book_author() ?></a></div>

<?php
				if (can_now_reading_admin())
				{
?>
					<div class="meta-item nr-edit">
						<span class="icon">&nbsp;</span>
						<a href="<?php book_edit_url(); ?>">Edit this book</a>
					</div>

					<div class="meta-item nr-manage">
						<span class="icon">&nbsp;</span>
						<a href="<?php manage_library_url(); ?>"><?php _e('Manage Books', 'now-reading-redux');?></a>
					</div>
<?php
				}
?>
								<div class="meta-item"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>"><span data-icon="&#xe023;" class="info-icon"></span><?php echo get_the_date(); ?></a></div>
								<div class="meta-item"><a href="<?php the_permalink(); ?>#comments" rel="bookmark" title="<?php _e('Go to comment section', 'romangie'); ?>"><span data-icon="&#xe065;" class="info-icon"></span><?php printf( _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'romangie' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></a></div>
								<?php if ( has_category() ) { ?><div class="meta-item"><?php _e('Categories:', 'romangie' ); ?><?php the_category(); ?></div><?php } ?>
								<?php if ( has_tag() ) { ?><div class="meta-item"><?php _e('Tags:', 'romangie' ); the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div><?php } ?>
								<?php edit_post_link(__( 'Edit this entry.', 'romangie') , '<div class="meta-item">', '</div>'); ?>
							</div>
						</div>

		<div class="<?php echo $romangie_right_col_class; ?>">
			<?php get_sidebar('primary'); ?>
		</div>
</div>

<?php get_footer(); ?>