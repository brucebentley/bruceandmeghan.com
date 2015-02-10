<?php
/**
 * Wedding 2015 functions and definitions
 *
 * @package Wedding 2015
 */

    add_filter('show_admin_bar', '__return_false');

    define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit(  get_stylesheet_directory() . '/inc/meta-box' ) );

    // Include The Meta-Box Script
    require_once RWMB_DIR . 'meta-box.php';
    require_once (get_template_directory().'/inc/meta-box.php');

    /**
     * Set the content width based on the theme's design and stylesheet.
     */
    if ( ! isset( $content_width ) ) {
        $content_width = 640; /* pixels */
    }

    if ( ! function_exists( 'wedding_2015_setup' ) ) :
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         */
        function wedding_2015_setup() {

            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Wedding 2015, use a find and replace
             * to change 'wedding-2015' to the name of your theme in all the template files
             */
            load_theme_textdomain( 'wedding-2015', get_template_directory() . '/languages' );

            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
             */
            //add_theme_support( 'post-thumbnails' );

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus( array(
                'primary' => __( 'Primary Menu', 'wedding-2015' ),
            ) );

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support( 'html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
            ) );

            /*
            * Enable support for Post Formats.
            * See http://codex.wordpress.org/Post_Formats
            */
            add_theme_support( 'post-formats', array(
                'aside', 'image', 'video', 'quote', 'link',
            ) );

            // Set up the WordPress core custom background feature.
            add_theme_support( 'custom-background', apply_filters( 'wedding_2015_custom_background_args', array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
            ) ) );
        }
    endif; // wedding_2015_setup
    add_action( 'after_setup_theme', 'wedding_2015_setup' );

    /**
     * Register widget area.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_sidebar
     */
    function wedding_2015_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Sidebar', 'wedding-2015' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<div class="module %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="sub-title">',
            'after_title'   => '</h4>',
        ) );
    }
    add_action( 'widgets_init', 'wedding_2015_widgets_init' );

    /**
     * Enqueue scripts and styles.
     */
    function wedding_2015_scripts() {
        wp_enqueue_style( 'wedding-2015-style', get_stylesheet_uri() );

        wp_enqueue_script( 'wedding-2015-global', get_template_directory_uri() . '/js/main.js', array(), '20120206', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'wedding_2015_scripts' );

    /**
     * Implement the Custom Header feature.
     */
    //require get_template_directory() . '/inc/custom-header.php';

    /**
     * Custom template tags for this theme.
     */
    require get_template_directory() . '/inc/template-tags.php';

    /**
     * Custom functions that act independently of the theme templates.
     */
    require get_template_directory() . '/inc/extras.php';

    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/customizer.php';

    /**
     * Load Jetpack compatibility file.
     */
    require get_template_directory() . '/inc/jetpack.php';

    /**
     * Load Wufoo's PHP API Wrapper.
     */
    require_once (get_template_directory().'/wufoo/WufooApiWrapper.php');

    function wufoo_post() {
        $data       = wufoo_sanitize($_POST['fields']);
        $api_key    = '55IR-RPO3-82QX-ISGC';
        $form_hash  = 'm1pswrrl1up254b';
        $wufoo_id   = 'brucebentley';

        $api        = new WufooApiWrapper($api_key, $wufoo_id);
        $response   = $api->entryPost($form_hash, $data);

        header('Content-Type: application/json');
        exit(json_encode($resp));
    }

    function wufoo_sanitize($arg) {
        $post_data  = urldecode($arg);
        $arr        = explode('&', $post_data);
        $new_arr    = array();
        $wufoo_arr  = array();
        foreach($arr as $val) {
            $val_arr              = explode('=', $val);
            $new_arr[$val_arr[0]] = $val_arr[1];
        }
        foreach ($new_arr as $key => $value) {
            array_push($wufoo_arr, new WufooSubmitField($key, $value));
        }
        return $wufoo_arr;
    }
    add_action('wp_ajax_wufoo_post', 'wufoo_post');
    add_action('wp_ajax_nopriv_wufoo_post', 'wufoo_post');
