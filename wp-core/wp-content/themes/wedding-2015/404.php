<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Wedding 2015
 */

get_header(); ?>

<div class="content-wrap" id="contentWrap">
    <section class="section error-404 not-found">

        <div class="container">
            <div class="row">
                <br/>
                <br/>

                <h1 class="section-title centered">
                    <?php _e( ' Ruh Roh! That page can&rsquo;t be found!', 'wedding-2015' ); ?>
                </h1>

                <br/>
                <br/>

                <hr class="divider love">

                <br/>
                <br/>

                <h4 class="sub-title centered">
                    <?php _e( 'It would appear that this page of their story hasn&rsquo;t been written just quite yet...', 'wedding-2015' ); ?>
                </h4>

                <br/>
                <br/>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
