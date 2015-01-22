<?php
/*
Template Name: Home Page
*/
?>

<?php include("templates/header.php"); ?>

    <?php if ( have_posts() ) :
        // Do we have any posts/pages in the databse that match our query?
    ?>

        <?php while ( have_posts() ) : the_post();
            // If we have a page to show, start a loop that will display it
        ?>

            <section class="section" id="post-<?php the_ID(); ?>">
                <div class="container">
                    <div class="row">
                        <h2 class="section-title centered">
                            <?php the_title(); ?>
                        </h2>
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>

        <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

        <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

            <article class="post error">
                <h1 class="404">Nothing has been posted like that yet</h1>
            </article>

    <?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

<?php include("templates/footer.php"); ?>