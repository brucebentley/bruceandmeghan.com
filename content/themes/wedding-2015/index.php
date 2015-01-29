<?php get_header(); ?>

<div class="content-wrap">
    <section class="section entry-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 site-content" role="main">

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                        <?php endwhile; ?>

                        <?php echo wedding_pagination(); ?>

                    <?php else: ?>
                        <?php get_template_part( 'post-format/content', 'none' ); ?>
                    <?php endif; ?>
                </div><!--/.site-content -->

                <div class="col-md-3 sidebar" id="sideBar" role="complementary">
                    <div class="sidebar-inner">
                        <aside class="widget-area">
                            <?php dynamic_sidebar( 'sidebar' ); ?>
                        </aside>
                    </div>
                </div><!--/#sideBar -->
            </div>
        </div>
    </section><!--/.entry-content -->
</div><!--/.content-wrap -->

<?php get_footer(); ?>