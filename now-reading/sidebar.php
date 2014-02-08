<div class="now-reading">
	<?php if( have_books('status=reading') ) : ?>
		<?php while( have_books('status=reading&num=1&orderby=random') ) : the_book(); ?>
		<div class="book">
			<span class="bookimage"><a href="<?php book_permalink() ?>"><img src="<?php book_image() ?>" alt="<?php book_title() ?>" /></a></span>
			<span class="bookmeta"><a href="<?php book_permalink() ?>"><?php book_title() ?></a> by <?php book_author() ?></span>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<h3>Recent Books</h3>
	<?php if( have_books('status=read&orderby=finished&order=desc&num=4') ) : ?>
		<ul class="little-list">
		<?php while( have_books('status=read&orderby=finished&order=desc&num=3') ) : the_book(); ?>
			<li><a href="<?php book_permalink() ?>"><img src="<?php book_image() ?>" alt="<?php book_title() ?>" width="65" height="105"/></a></li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<h3>Future Reads</h3>
	<?php if( have_books('status=unread&num=4&orderby=random') ) : ?>
		<ul class="little-list">
		<?php while( have_books('status=unread') ) : the_book(); ?>
			<li><a href="<?php book_permalink() ?>"><img src="<?php book_image() ?>" alt="<?php book_title() ?>" width="65" height="105"/></a></li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
</div>
