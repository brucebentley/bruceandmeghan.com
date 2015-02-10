<?php
/*
 * Template Name: Home Page
 */
?>

<?php get_header(); ?>

<div class="content-wrap" id="contentWrap">
    <?php
        $current_page_id = get_option('page_on_front'); // Get Front Page ID

        if( ( $locations = get_nav_menu_locations() ) && $locations['primary'] ) {

            $menu = wp_get_nav_menu_object( $locations['primary'] );
            $menu_items = wp_get_nav_menu_items( $menu->term_id );

            $post_ids = array();
            foreach ($menu_items as $items) {
                if($items->object == 'page') {
                    $post_ids[] = $items->object_id;
                }
            }

            $args = array(
                'post_type' => 'page',
                'post__in' => $post_ids,
                'posts_per_page' => count( $post_ids ),
                'order' => 'ASC',
                'orderby' => 'post__in'
            );
        } else {
            $args = array(
                'post_type' => 'page',
                'post__in' => $post_ids,
                'posts_per_page' => count( $post_ids ),
                'order' => 'ASC',
                'orderby' => 'post__in'
            );
        }

        $allPosts = new WP_Query( $args );

        if (have_posts()) {
            while ( $allPosts->have_posts() ) {
                $allPosts->the_post();

                global $post;

                $separator          = get_post_meta( $post->ID, 'wedding_no_hash', true );
                $page_section       = get_post_meta( $post->ID, 'wedding_section_type', true );
                $no_title           = get_post_meta( $post->ID, 'wedding_no_title', true );
                $menu_disable       = get_post_meta( $post->ID, 'wedding_disable_menu', true );
                $bg_color           = get_post_meta( $post->ID, 'wedding_bg_color', true );

                $postId = get_the_ID();

                if(( $separator != 1 ) && ( $postId != $current_page_id )) {
                    if( $page_section == 'default' ){
                    ?>
                        <section class="section <?php echo $post->post_name; ?>" id="<?php echo $post->post_name; ?>">
                            <div class="container">
                                <?php
                                    if( $no_title != 1 ) {
                                        $page_title         = get_post_meta( $post->ID, 'wedding_page_title', true );
                                        $page_subtitle      = get_post_meta( $post->ID, 'wedding_page_subtitle', true );
                                    ?>
                                    <div class="row entry-title">
                                        <h2 class="section-title centered">
                                            <?php
                                                if($page_title != '') {
                                                    echo $page_title;
                                                } else {
                                                    echo get_the_title();
                                                }
                                            ?>
                                        </h2>

                                        <?php if( $page_subtitle != ''){ ?>
                                            <h4 class="sub-title centered"><?php echo $page_subtitle; ?></h4>
                                        <?php } ?>

                                        <hr class="divider love small">
                                    </div>
                                <?php }?>

                                <div class="row">
                                    <?php echo do_shortcode(get_the_content()); ?>
                                </div>
                            </div>
                        </section>
                    <?php
                    }
                    elseif( $page_section == 'header' ) {
                    ?>
                        <section class="section <?php echo $post->post_name; ?>" id="<?php echo $post->post_name; ?>">
                            <div class="section-background">
                                <div class="section-background-image"></div>
                            </div>

                            <div class="container">
                                <?php
                                    if( $no_title != 1 ) {
                                        $page_title         = get_post_meta( $post->ID, 'wedding_page_title', true );
                                        $page_subtitle      = get_post_meta( $post->ID, 'wedding_page_subtitle', true );
                                    ?>
                                    <div class="row entry-title">
                                        <h2 class="section-title centered">
                                            <?php
                                                if($page_title != '') {
                                                    echo $page_title;
                                                } else {
                                                    echo get_the_title();
                                                }
                                            ?>
                                        </h2>

                                        <?php if( $page_subtitle != ''){ ?>
                                            <h4 class="sub-title centered"><?php echo $page_subtitle; ?></h4>
                                        <?php } ?>

                                        <hr class="divider love">
                                    </div>
                                <?php }?>

                                <div class="row">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </section>

                        <hr class="divider love">
                    <?php
                    }
                }
            }

            wp_reset_query();
        }
    ?>
</div>

<?php get_footer(); ?>