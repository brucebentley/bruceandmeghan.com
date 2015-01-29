<?php get_header(); ?>

    <div class="content-wrap">
        <section class="section entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 site-content" role="main">
                        <?php /* The loop */ ?>
                        <?php while ( have_posts() ): the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <h1 class="entry-title"><?php the_title(); ?></h1>

                                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                    <div class="entry-thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="entry-content">
                                    <?php the_content(); ?>
                                    <?php wp_link_pages(); ?>
                                </div>
                            </article>
                            <?php // comment_template(); ?>

                        <?php endwhile; ?>
                    </div>

                    <div class="col-md-3 sidebar" id="sideBar" role="complementary">
                        <div class="sidebar-inner">
                            <aside class="widget-area">
                                <?php dynamic_sidebar( 'sidebar' ); ?>
                            </aside>
                        </div>
                    </div><!--/#sideBar -->
                </div>
            </div>
        </section>
    </div>

<?php get_footer();