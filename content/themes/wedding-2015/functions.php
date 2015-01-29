<?php

    add_filter('show_admin_bar', '__return_false');

    define('THEMNAME', wp_get_theme()->get( 'Name' ));
    define('THMCSS', get_template_directory_uri().'/css/');
    define('THMJS', get_template_directory_uri().'/js/');

    define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/lib/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit(  get_stylesheet_directory() . '/lib/meta-box' ) );

    // Include The Meta-Box Script
    require_once RWMB_DIR . 'meta-box.php';
    require_once (get_template_directory().'/lib/meta-box.php');


/*-------------------------------------------*
 *              Register Navigation
 *------------------------------------------*/
    register_nav_menu( 'primary','Primary Menu' );
    register_nav_menu( 'secondary','Secondary Menu' );


function getContrast50($hexcolor){
    return (hexdec($hexcolor) > 0xffffff/2) ? 'light-bg':'dark-bg';
}

/*-------------------------------------------*
 *              Theme setup
 *------------------------------------------*/
    if(!function_exists('wedding_style')):
        function wedding_style() {
            global $wedding;

            wp_enqueue_style('thm-style',get_stylesheet_uri());

            wp_enqueue_script('jquery');
            wp_enqueue_script('bootstrap',THMJS.'bootstrap.min.js',array(),false,true);
            wp_enqueue_script('SmoothScroll',THMJS.'SmoothScroll.js',array(),false,true);
            wp_enqueue_script('scrollTo',THMJS.'jquery.scrollTo.js',array(),false,true);
            wp_enqueue_script('nav',THMJS.'jquery.nav.js',array(),false,true);
            wp_enqueue_script('parallax',THMJS.'jquery.parallax.js',array(),false,true);
            wp_enqueue_script('main',THMJS.'main.js',array(),false,true);
        }
        add_action('wp_enqueue_scripts','wedding_style');
    endif;

    if(!function_exists('wedding_admin_style')):
        function wedding_admin_style() {
            if(is_admin()) {
                wp_register_script('thmpostmeta', get_template_directory_uri() .'/js/admin/zee-post-meta.js');
                wp_enqueue_script('thmpostmeta');
            }
        }
        add_action('admin_enqueue_scripts','wedding_admin_style');
    endif;


/*-------------------------------------------*
 *      Widget Registration
 *------------------------------------------*/
    if(!function_exists('weddingtheme_widget_init')):
        function weddingtheme_widget_init() {
            register_sidebar(array(
                'name'          => __( 'Sidebar', 'wedding' ),
                'id'            => 'sidebar',
                'description'   => __( 'Widgets in this area will be shown on Sidebar.', 'wedding' ),
                'before_title'  => '<h3  class="widget_title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div>'
            ));

            register_sidebar(array(
                'name'          => __( 'Bottom', 'wedding' ),
                'id'            => 'bottom',
                'description'   => __( 'Widgets in this area will be shown before Footer.' , 'wedding'),
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div class="col-sm-3 col-xs-6 bottom-widget"><div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div></div>'
            ));
        }
        add_action('widgets_init','weddingtheme_widget_init');
    endif;


/*-------------------------------------------*
 *              Excerpt Length
 *------------------------------------------*/
    if(!function_exists('new_excerpt_more')):
        function new_excerpt_more( $more ) {
            return '&nbsp;<br /><br /><a class="btn btn-success btn-lg" href="'. get_permalink( get_the_ID() ) . '">'.__('Continue Reading','wedding').' &rarr;</a>';
        }
        add_filter( 'excerpt_more', 'new_excerpt_more' );
    endif;

    if(!function_exists('wedding_slug')):
    function wedding_slug($text) {
        return preg_replace('/[^a-z0-9_]/i','-', strtolower($text));
    }
    endif;


/*-------------------------------------------------------
 *          Pagination
 *-------------------------------------------------------*/
    if(!function_exists('wedding_pagination')):
        function wedding_pagination($pages = '', $range = 2) {
            $showitems = ($range * 1)+1;

            global $paged;

            if(empty($paged)) $paged = 1;

            if($pages == '') {
                global $wp_query;
                $pages = $wp_query->max_num_pages;

                if(!$pages) {
                    $pages = 1;
                }
            }

            if(1 != $pages) {
                echo "<ul class='pagination'>";

                if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
                    echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
                }

                if($paged > 1 && $showitems < $pages) {
                    echo '<li>';
                    previous_posts_link("Previous");
                    echo '</li>';
                }

                for ($i=1; $i <= $pages; $i++) {
                    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                        echo ($paged == $i)? "<li class='active'><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
                    }
                }

                if ($paged < $pages && $showitems < $pages) {
                    echo '<li>';
                    next_posts_link("Next");
                    echo '</li>';
                }

                if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
                    echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
                }

                echo "</ul>";
            }
        }
    endif;


/*--------------------------------------------------------------
 * Get All Terms of Taxonomy
 *-------------------------------------------------------------*/
    function get_all_term_names( $post_id, $taxonomy = 'post_tag' ) {
        $terms = get_the_terms( $post_id, $taxonomy );

        $term_names = '';
        if ( $terms && ! is_wp_error( $terms ) ) {
            $term_name = array();

            foreach ( $terms as $term ) {
                $term_name[] = $term->name;
            }

            $term_names = join( ", ", $term_name );
        }
        return $term_names;
    }


/*--------------------------------------------------------------
 *              One-Page Nav Walker
 *-------------------------------------------------------------*/
    class Onepage_Walker extends Walker_Nav_menu {
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

            global $wp_query;

            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = join(' ', $classes);

            $class_names = ' class="'. esc_attr( $class_names ) . '"';


            $attributes     = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes     .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';


            if($item->object == 'page') {
                $post_object = get_post($item->object_id);

                $separate_page = get_post_meta($item->object_id, "thm_no_hash", true);

                $disable_item = get_post_meta($item->object_id, "thm_disable_menu", true);

                $current_page_id = get_option('page_on_front');

                if ( ( $disable_item != true ) && ( $post_object->ID != $current_page_id ) ) {

                    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names.'>';

                    if ( $separate_page == true )
                    $attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'" class="no-scroll"' : '';
                    else {
                        if (is_front_page())
                            $attributes .= ' href="#' . $post_object->post_name . '"';
                        else
                            $attributes .= ' href="' . home_url() . '#' . $post_object->post_name . '" class="no-scroll"';
                    }

                    $item_output = $args->before;
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
                    $item_output .= $args->link_after;
                    $item_output .= '</a>';
                    $item_output .= $args->after;

                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
                } else {
                    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names.'>';

                    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'" class="no-scroll"' : '';

                    $item_output = $args->before;
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
                    $item_output .= $args->link_after;
                    $item_output .= '</a>';
                    $item_output .= $args->after;

                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
                }
            }
        }
    }

?>