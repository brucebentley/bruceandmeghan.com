<?php
/*
 * Template Name: Coming Soon Page
 */
?>

<?php get_header(); the_post(); ?>

    <div class="content-wrap">
        <section class="section entry-content" id="entryContent">
            <div class="container">
                <div class="row entry-title">
                    <h2 class="section-title centered">
                        <?php the_title(); ?>
                    </h2>
                    <h4 class="sub-title centered">We're still working hard to get everything in place for you... Please bear with us!</h4>
                    <hr class="divider love small">
                </div>
                <div class="row">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>