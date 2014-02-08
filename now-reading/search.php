<?php get_header(); global $nr_id; ?>

<div id="main">
	<h2 class="entry-title">Library Search results for &ldquo;<?php search_query(); ?>&rdquo;</h2>
					<?php if( have_books("status=all&num=-1&search={$GLOBALS['query']}") ) : ?>
					<ul>
						<?php while( have_books("status=all&num=-1&search={$GLOBALS['query']}") ) : the_book(); ?>
						<li><a href="<?php book_permalink() ?>"><?php book_title() ?></a> by <a href="<?php book_author_permalink() ?>"><?php book_author() ?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php else : ?>
					<p>Sorry, but there were no search results for your query.</p>
					<?php endif; ?>
        	                <?php if( can_now_reading_admin() ) : ?>
	                        <p>Admin: &raquo; <a href="<?php manage_library_url() ?>">Manage Books</a></p>
                        	<?php endif; ?>
                	        <?php library_search_form() ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><a href="<?php library_url() ?>">&laquo; Back to library</a></div>
			<div class="nav-next"></div>
		</div><!-- .nav-below -->
</div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
