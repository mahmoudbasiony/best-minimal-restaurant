<?php
/**
 * Template Name: Location Page Template
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */
?>

    <!---- Header ---->
    <?php get_header(); ?>

    <main id="primary site-content" class="site-main">

        <?php
            // Location page template parts.
            get_template_part( "template-parts/{$active_template}/content", "location" );

            // CTA section.
            if ( apply_filters( 'urestaurant_home_show_cta_section', true ) ) :
                get_template_part( "template-parts/{$active_template}/section", "call-to-action" );
            endif;

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        ?>

    </main>

    <style type="text/css">
        .acf-map {
            width: 100%;
            height: 450px;
            border: #ccc solid 1px;
        }
        .acf-map img {
            max-width: inherit !important;
        }
    </style>

    <script type="text/javascript">
        (function( $ ) {

        /**
         * initMap
         *
         * Renders a Google Map onto the selected jQuery element
         *
         * @since   1.0.0
         *
         * @param   jQuery $el The jQuery element.
         *
         * @return  object The map instance.
         */
        function initMap( $el ) {

            // Find marker elements within map.
            var $markers = $el.find('.marker');

            // Create gerenic map.
            var mapArgs = {
                zoom        : $el.data('zoom') || 16,
                mapTypeId   : google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map( $el[0], mapArgs );

            console.log(map);
            // Add markers.
            map.markers = [];
            $markers.each(function(){
                initMarker( $(this), map );
            });

            // Center map based on markers.
            centerMap( map );

            // Return map instance.
            return map;
        }

        /**
         * initMarker
         *
         * Creates a marker for the given jQuery element and map.
         *
         * @since   1.0.0
         *
         * @param   jQuery $el The jQuery element.
         * @param   object The map instance.
         *
         * @return  object The marker instance.
         */
        function initMarker( $marker, map ) {

            // Get position from marker.
            var lat = $marker.data('lat');
            var lng = $marker.data('lng');
            var latLng = {
                lat: parseFloat( lat ),
                lng: parseFloat( lng )
            };

            // Create marker instance.
            var marker = new google.maps.Marker({
                position : latLng,
                map: map
            });

            // Append to reference for later use.
            map.markers.push( marker );

            // If marker contains HTML, add it to an infoWindow.
            if( $marker.html() ){

                // Create info window.
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });

                // Show info window when marker is clicked.
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open( map, marker );
                });
            }
        }

        /**
         * centerMap
         *
         * Centers the map showing all markers in view.
         *
         * @since   1.0.0
         *
         * @param   object The map instance.
         *
         * @return  void
         */
        function centerMap( map ) {

            // Create map boundaries from all map markers.
            var bounds = new google.maps.LatLngBounds();
            map.markers.forEach(function( marker ){
                bounds.extend({
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                });
            });

            // Case: Single marker.
            if( map.markers.length == 1 ){
                map.setCenter( bounds.getCenter() );

            // Case: Multiple markers.
            } else{
                map.fitBounds( bounds );
            }
        }

        // Render maps on page load.
        $(document).ready(function(){
            $('.acf-map').each(function(){
                var map = initMap( $(this) );
            });
        });

        })(jQuery);
    </script>

    <!---- Footer ---->
    <?php get_footer(); ?>
