<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Wedding 2015
 */

get_header(); ?>

<div class="content-wrap" id="contentWrap">

    <section class="section main" role="main">
        <div class="container">
            <div class="row">
                <div class="page-posts col-md-8 col-lg-9">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

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
            </div>
        </div>
    </section>

</div>
<?php get_footer(); ?>
