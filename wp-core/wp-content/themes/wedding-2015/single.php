<?php
/**
 * The template for displaying all single posts.
 *
 * @package Wedding 2015
 */

get_header(); ?>

<div class="content-wrap" id="contentWrap">
    <div class="container">
        <div class="row">
            <section class="section main">
                <div class="col-md-8 col-lg-9">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'single' ); ?>

                        <?php the_post_navigation(); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>
                </div>

                <aside class="sidebar col-md-4 col-lg-3" role="complementary">
                    <?php get_sidebar(); ?>
                </aside>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
