<?php
/*
 * Template Name: Confirmation Page
 */
?>

<?php get_header(); the_post(); ?>

    <div class="content-wrap">
        <section class="section reception confirmed" id="">
            <div class="section-background">
                <div class="section-background-image"></div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h2 class="section-title centered">
                                    <?php the_title(); ?>
                                </h2>
                                <h4 class="sub-title centered"><?php echo $page_subtitle; ?></h4>
                                <hr class="divider love small">
                            </div>
                            <div class="panel-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>