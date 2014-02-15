<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title>Library |  <?php bloginfo('name'); ?></title>
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
			<div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
			<div class="col-md-2 meta info hidden-xs">
				<span data-icon="&#xe086;" class="metaicon"></span>
                <hr class="metaline" />
                <div class="additional-meta">
                    <div class="meta-item">Total: <?php total_books() ?></div>
                    <div class="meta-item">Last Month: <?php books_read_since('1 month') ?></div>
                 </div>
			</div>
			<div class="post col-md-8" id="post-<?php the_ID(); ?> nr-library">

				<h2 class="entry-title">Now Reading</h2>
				<div class="entry">
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
				</div>

				<h2 class="entry-title">Reading Stack</h2>
				<div class="entry">
					<?php if( have_books('status=unread&num=-1') ) : ?>
						<ul>
						<?php while( have_books('status=unread&num=-1') ) : the_book(); ?>
							<li><a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_title() ?></a> by <a href="<?php book_author_permalink() ?>" title="<?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_author() ?></a></li>
						<?php endwhile; ?>
						</ul>
					<?php else : ?>
						<p>None</p>
					<?php endif; ?>
				</div>

				<h2 class="entry-title">Completed Books</h2>
				<div class="entry">
					<?php if( have_books('status=read&orderby=finished&order=desc&num=-1') ) : ?>
						<ul>
						<?php while( have_books('status=read&orderby=finished&order=desc&num=-1') ) : the_book(); ?>
							<li><a href="<?php book_permalink() ?>" title="<?php book_title() ?> | <?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_title() ?></a> by <a href="<?php book_author_permalink() ?>" title="<?php book_author() ?> | Library | <?php bloginfo('name'); ?>"><?php book_author() ?></a></li>
						<?php endwhile; ?>
						</ul>
					<?php else : ?>
						<p>None</p>
					<?php endif; ?>
				</div>

			</div>
		</div>
		
		<div class="comments">
			<?php comments_template( '', true ); ?>
		</div>

<?php get_footer(); ?>