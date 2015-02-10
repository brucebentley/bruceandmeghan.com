<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Wedding 2015
 */

    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() ) {
        return;
    }
?>

<section class="comments-area" id="comments">

    <?php if ( have_comments() ) : ?>
        <h3 class="sub-title">Comments</h3>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'wedding-2015' ); ?>
                </h1>

                <div class="nav-previous">
                    <?php previous_comments_link( __( '&larr; Older Comments', 'wedding-2015' ) ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( __( 'Newer Comments &rarr;', 'wedding-2015' ) ); ?>
                </div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'wedding-2015' ); ?>
                </h1>

                <div class="nav-previous">
                    <?php previous_comments_link( __( '&larr; Older Comments', 'wedding-2015' ) ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( __( 'Newer Comments &rarr;', 'wedding-2015' ) ); ?>
                </div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments">
            <?php _e( 'Comments are closed.', 'wedding-2015' ); ?>
        </p>
    <?php endif; ?>

    <?php comment_form(); ?>
</section>
