<?php get_header(); global $nr_id; ?>

<div id="main">
	<h2 class="entry-title">Books by <?php the_book_author() ?></h2>
		<?php if( have_books("author={$GLOBALS['nr_author']}&num=-1") ) : ?>
			<span class="current-reads">
				<?php while( have_books('num=1') ) : the_book(); ?>
					<a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><img src="<?php book_image() ?>" alt="<?php book_title() ?> by <?php book_author() ?>" /></a>
				<?php endwhile; ?>
			</span>
		<?php else : ?>
			<p>There are no books by this author!</p>
		<?php endif; ?>
		<?php if( can_now_reading_admin() ) : ?>
			<p>Admin: &raquo; <a href="<?php manage_library_url() ?>">Manage Books</a></p>
		<?php endif; ?>
		<?php library_search_form() ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><a href="<?php library_url() ?>">&laquo; Back to library</a></div>
			<div class="nav-next"></div>
		</div><!-- #nav-below -->
	</div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
