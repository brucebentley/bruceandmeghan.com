<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">

    </header>

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="icon fa fa-thumb-tack fa-fw"></i>
            </h4>
            <h6 class="publish-date">
                <time class="entry-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('j M Y'); ?></time>
            </h6>
        </div>
        <div class="media-body">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
                <sup class="featured-post"><?php _e( 'Sticky', 'wedding' ) ?></sup>
                <?php } ?>
            </h2>

            <div class="clearfix entry-meta">
                <ul>
                    <li class="author-category"><i class="fa fa-pencil"></i> BY <?php the_author_posts_link() ?> IN <?php echo get_the_category_list(', '); ?>
                    </li>
                </ul>
            </div>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>

    <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article>