<?php
/**
 * @package Wedding 2015
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" role="main">
    <header class="article-header">
        <?php the_title( '<h2 class="section-title centered">', '</h2>'); ?>

        <p class="sub-title time centered">
            <?php wedding_2015_posted_on(); ?>
        </p>
    </header>

    <?php the_content(); ?>

    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'wedding-2015' ),
            'after'  => '</div>',
        ) );
    ?>

    <footer class="article-footer">
        <?php wedding_2015_entry_footer(); ?>
    </footer>
</article>
