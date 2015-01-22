<?php
    /*-----------------------------------------------------------------------------------*/
    /* This template will be called by all other template files to begin
    /* rendering the page and display the header/nav
    /*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<? bloginfo( 'description' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <title>
        <?php bloginfo('name'); // show the blog name, from settings ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
    </title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php // We are loading our theme directory style.css by queuing scripts in our functions.php file,
          // so if you want to load other stylesheets,
          // I would load them with an @import call in your style.css
    ?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head();
        // This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
        // (right here) into the head of your website.
        // Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
        // Move it if you like, but I would keep it around.
    ?>
</head>

<body <?php body_class();
    // This will display a class specific to whatever is being loaded by Wordpress
    // i.e. on a home page, it will return [class="home"]
    // on a single post, it will return [class="single postid-{ID}"]
    // and the list goes on. Look it up if you want more.
    ?>
>

    <!--[if lt IE 10]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="app-container">

        <header class="header app-bar" id="header" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="Bruce &amp; Meghan">
                                <span class="him">Bruce</span>
                                <img class="two-hearts red" src="<?php bloginfo('template_url'); ?>/assets/images/icons/two-hearts-red.png">
                                <span class="her">Meghan</span>
                            </a>
                        </h1>
                    </div>
                    <div class="col-md-6">
                        <h2 class="wedding-date pull-right">
                            <span class="day accent-color">Saturday,</span>
                            <span class="date-month">July 11,</span>
                            <span class="year accent-color">2015</span>
                        </h2>
                    </div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only">MENU</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/icons/two-hearts-red.png" alt="Bruce &amp; Meghan">
                        <span class="initials">B<span>&amp;</span>M</span>
                    </a>
                </div>

                <nav class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="/#ourStory" alt="Our Story">Our Story</a>
                        </li>
                        <li>
                            <a href="/#featuredPhotos" alt="Photos">Photos</a>
                        </li>
                        <li>
                            <a href="/#theEvents" alt="The Events">The Events</a>
                        </li>
                        <li>
                            <a href="/#groomsmen" alt="Groomsmen">Groomsmen</a>
                        </li>
                        <li>
                            <a href="/#bridesmaids" alt="Bridesmaids">Bridesmaids</a>
                        </li>
                        <li>
                            <a href="/#registry" alt="Registry">Registry</a>
                        </li>
                        <li>
                            <a href="/#rsvp" alt="RSVP">RSVP</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="content-wrap">
