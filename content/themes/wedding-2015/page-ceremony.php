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
              var styles = [
                  {
                      "featureType":"administrative",
                      "elementType":"all",
                      "stylers": [
                          { "visibility":"on" },
                          { "lightness":33 }
                      ]
                  },{
                      "featureType":"landscape",
                      "elementType":"all",
                      "stylers":[
                          { "color":"#f2e5d4" }
                      ]
                  },{
                      "featureType":"poi.park",
                      "elementType":"geometry",
                      "stylers":[
                          { "color":"#c5dac6" }
                      ]
                  },{
                      "featureType":"poi.park",
                      "elementType":"labels",
                      "stylers":[
                          { "visibility":"on" },
                          { "lightness":20 }
                      ]
                  },{
                      "featureType":"road",
                      "elementType":"all",
                      "stylers":[
                          { "lightness":20 }
                      ]
                  },{
                      "featureType":"road.highway",
                      "elementType":"geometry",
                      "stylers":[
                          { "color":"#c5c6c6" }
                      ]
                  },{
                      "featureType":"road.arterial",
                      "elementType":"geometry",
                      "stylers":[
                          { "color":"#e4d7c6" }
                      ]
                  },{
                      "featureType":"road.local",
                      "elementType":"geometry",
                      "stylers":[
                          { "color":"#fbfaf7" }
                      ]
                  },{
                      "featureType":"water",
                      "elementType":"all",
                      "stylers":[
                          { "visibility":"on"},
                          { "color":"#acbcc9"}
                      ]
                  }
              ];

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