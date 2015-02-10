<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Wedding 2015
 */
?>


<article <?php post_class(); ?> id="page-<?php the_ID(); ?>">

    <?php the_title( '<h2 class="section-title centered">', '</h2>' ); ?>

    <hr class="divider love small">

    <?php the_content(); ?>

    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'wedding-2015' ),
            'after'  => '</div>',
        ) );
    ?>

    <?php edit_post_link( __( 'Edit', 'wedding-2015' ), '<span class="edit-link">', '</span>' ); ?>
</article>
