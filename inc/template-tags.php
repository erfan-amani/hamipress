<?php

if( ! function_exists( 'hamipress_posts_navigation' ) ) :
	/**
	 * navigate to new/old posts
	 */
	function hamipress_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					hamipress_get_icon_svg( 'ui','chevron_left', 22 ),
					__( 'Newer posts', HAMIPRESS_TEXTDOMAIN )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', HAMIPRESS_TEXTDOMAIN ),
					hamipress_get_icon_svg( 'ui', 'chevron_right', 22 )
				),
			)
		);
	}
endif;

if( ! function_exists('hamipress_post_thumbnail') ):
	function hamipress_post_thumbnail(){
		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php
		else :
			?>

			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
			</figure>

		<?php
		endif; // End is_singular().
	}
endif;

if( ! function_exists('hamipress_article_footer') ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hamipress_article_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			hamipress_posted_by();

			// Posted on
			hamipress_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', HAMIPRESS_TEXTDOMAIN ) );
			if ( $categories_list ) {
				printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					hamipress_get_icon_svg('ui', 'archive', 16 ),
					__( 'Posted in', HAMIPRESS_TEXTDOMAIN ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', HAMIPRESS_TEXTDOMAIN ) );
			if ( $tags_list ) {
				printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					hamipress_get_icon_svg('ui', 'tag', 16 ),
					__( 'Tags:', HAMIPRESS_TEXTDOMAIN ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			hamipress_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', HAMIPRESS_TEXTDOMAIN ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . hamipress_get_icon_svg('ui', 'edit', 16 ),
			'</span>'
		);
	}
endif;

if( ! function_exists('hamipress_posted_on') ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hamipress_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			hamipress_get_icon_svg('ui', 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if( ! function_exists('hamipress_posted_by') ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function hamipress_posted_by() {
		printf(
		/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			hamipress_get_icon_svg('ui', 'person', 16 ),
			__( 'Posted by', HAMIPRESS_TEXTDOMAIN ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if( ! function_exists('hamipress_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function hamipress_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo hamipress_get_icon_svg('ui', 'comment', 16 );

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', HAMIPRESS_TEXTDOMAIN ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if( ! function_exists('hamipress_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function hamipress_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				twentynineteen_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if( ! function_exists('hamipress_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function hamipress_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;