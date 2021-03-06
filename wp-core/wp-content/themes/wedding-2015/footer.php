<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wedding 2015
 */
?>


        <section class="section bg-color social-feeds" id="socialFeeds">
            <div class="container">
                <div class="row">
                    <h2 class="section-title centered">Let's Get Social</h2>
                    <h4 class="sub-title centered">Spread the word, &amp; let's have a great time!</h4>

                    <hr class="divider love alt small">

                    <div class="col-md-12">
                        <p class="welcome centered">
                            Throughout this entire process, we'd <i>LOVE</i> for everyone to share in the excitement with us!<br/>
                            To participate, simply tag all of your photos/posts/tweets/updates with our wedding tag:<br/>

                            <h2 class="sub-title centered">#MeetTheBentleys</h2>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <?php include("parts/registry.php"); ?>

        <section class="section footer contact-info" id="contactInfo">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="section-title centered">Get In Touch!</h2>

                        <hr class="divider love small">

                        <p class="sub-title centered">
                            We're more than certain that there's probably additional questions you might have. If you'd like to get in touch with us directly, please use the following email address:<br/><br/>
                            <a href="mailto:bruceandmeghan@gmail.com?subject=I'd Love To Get More Information About The Wedding!">bruceandmeghan@gmail.com</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title centered">About This Site</h2>
                        <hr class="divider love small">
                        <p class="sub-title centered">
                            We put this site together to hopefully provide as much information as possible about our upcoming Wedding. Please make sure to check back often for the latest updates &amp; don't forget to RSVP!
                            <br/>
                            <br/>
                            - Bruce &amp; Meghan
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section footer bottom" id="footer">
            <div class="container">
                <div class="row centered">
                    <div class="col-md-12">
                        <span class="copyright">Site Designed &amp; Created with <span class="accent-color"><svg class="icon svg-icon heart" viewBox="0 0 20 20"><path fill="none" d="M13.22,2.984c-1.125,0-2.504,0.377-3.53,1.182C8.756,3.441,7.502,2.984,6.28,2.984c-2.6,0-4.714,2.116-4.714,4.716c0,0.32,0.032,0.644,0.098,0.96c0.799,4.202,6.781,7.792,7.46,8.188c0.193,0.111,0.41,0.168,0.627,0.168c0.187,0,0.376-0.041,0.55-0.127c0.011-0.006,1.349-0.689,2.91-1.865c0.021-0.016,0.043-0.031,0.061-0.043c0.021-0.016,0.045-0.033,0.064-0.053c3.012-2.309,4.6-4.805,4.6-7.229C17.935,5.1,15.819,2.984,13.22,2.984z M12.544,13.966c-0.004,0.004-0.018,0.014-0.021,0.018s-0.018,0.012-0.023,0.016c-1.423,1.076-2.674,1.734-2.749,1.771c0,0-6.146-3.576-6.866-7.363C2.837,8.178,2.811,7.942,2.811,7.7c0-1.917,1.554-3.47,3.469-3.47c1.302,0,2.836,0.736,3.431,1.794c0.577-1.121,2.161-1.794,3.509-1.794c1.914,0,3.469,1.553,3.469,3.47C16.688,10.249,14.474,12.495,12.544,13.966z"></path></svg></span> by Bruce Bentley</span>
                    </div>
                </div>
            </div>
        </section><!--/#footer -->


    </div><!--/.app-container-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-26049157-5', 'auto');
        ga('send', 'pageview');
    </script>

    <?php wp_footer(); ?>
</body>
</html>
