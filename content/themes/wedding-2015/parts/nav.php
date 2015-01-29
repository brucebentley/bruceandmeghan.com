<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <!-- Navbar Header-->
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">MENU</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/two-hearts-red.png" alt="Bruce &amp; Meghan">
                <span class="initials">B<span>&amp;</span>M</span>
            </a>
        </div>

        <!-- Navbar Links-->
        <nav class="collapse navbar-collapse" id="navbarCollapse">
            <?php if(has_nav_menu('primary')): ?>
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nav navbar-nav'
                )); ?>
            <?php endif; ?>
        </nav>
    </div>
</nav>