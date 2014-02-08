<?php get_header() ?>
<div id="main">
			<h2 class="entry-title">Library</h2>
			<p>I've recorded a total of <?php total_books() ?> here. <?php books_read_since('1 year') ?> were read in the last year and <?php books_read_since('1 month') ?> in the last month. I am currently at <?php average_books('month'); ?>.</p>

			<h3>Current books</h3>
			<ul class="current-books">
			<?php if( have_books('status=reading&num=-1') ) : ?>
			<?php while( have_books('status=reading&num=-1') ) : the_book(); ?>
				<li><a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><img src="<?php book_image() ?>" alt="<?php book_title() ?> by <?php book_author() ?>" /></a></li>
			<?php endwhile; ?>
			</span>
			<?php else : ?>
				<li>None</li>
			<?php endif; ?>
			</ul>

			<h3>Reading Stack</h3>
			<?php if( have_books('status=unread&num=-1') ) : ?>
				<ul>
				<?php while( have_books('status=unread&num=-1') ) : the_book(); ?>
					<li><a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_title() ?></a> by <a href="<?php book_author_permalink() ?>" title="<?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_author() ?></a></li>
				<?php endwhile; ?>
				</ul>
			<?php else : ?>
				<p>None</p>
			<?php endif; ?>

			<h3>Completed Books</h3>
			<?php if( have_books('status=read&orderby=finished&order=desc&num=-1') ) : ?>
				<ul>
				<?php while( have_books('status=read&orderby=finished&order=desc&num=-1') ) : the_book(); ?>
					<li><a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_title() ?></a> by <a href="<?php book_author_permalink() ?>" title="<?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_author() ?></a></li>
				<?php endwhile; ?>
				</ul>
			<?php else : ?>
				<p>None</p>
			<?php endif; ?>

					<?php if( can_now_reading_admin() ) : ?>
					<p>Admin: &raquo; <a href="<?php manage_library_url() ?>">Manage Books</a></p>
					<?php endif; ?>
					<?php library_search_form() ?>

</div><!-- #main -->
<?php get_sidebar() ?>
<?php get_footer() ?>
