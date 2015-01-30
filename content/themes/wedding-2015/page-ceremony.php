<?php
/*
 * Template Name: Ceremony Page
 */
?>

<?php get_header(); the_post(); ?>

    <div class="content-wrap">
        <section class="section ceremony" id="ceremonyInfo">
            <div class="section-background">
                <div class="section-background-image"></div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h2 class="section-title centered">
                                    <?php the_title(); ?>
                                </h2>
                                <h4 class="sub-title centered">All the information you need for the Wedding Ceremony</h4>
                                <hr class="divider love small">
                            </div>
                            <div id="ceremonyMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section entry-content" id="entryContent">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&v=3.exp"></script>
    <script type="text/javascript">
        // Google Maps Integration
         google.maps.event.addDomListener(window, 'load', init);
         function init() {
              var styles = [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#EBE5E0"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]}];

              var mapOptions = {
                  zoom: 14,
                  center: new google.maps.LatLng(39.1568465, -77.9931161),
                  styles: styles
              };

              var mapElement = document.getElementById('ceremonyMap');
              var map = new google.maps.Map(mapElement, mapOptions);

              var marker = new google.maps.Marker({
                  map: map,
                  animation: google.maps.Animation.DROP,
                  position: new google.maps.LatLng(39.1568465, -77.9931161),
                  title: 'Rosemont Historic Manor'
              });
         }
    </script>

<?php get_footer(); ?>