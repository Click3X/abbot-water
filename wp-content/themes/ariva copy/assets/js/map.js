   function initialize() {

    var styles = [
      {
        stylers: [
          { hue: "#00ffe6" },
          { saturation: -20 }
        ]
      },{
        featureType: "road",
        elementType: "geometry",
        stylers: [
          { lightness: 100 },
          { visibility: "simplified" }
        ]
      },{
        featureType: "road",
        elementType: "labels",
        stylers: [
          { visibility: "off" }
        ]
      }
    ];
   

     var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
        center: new google.maps.LatLng(21.583341, 105.807374),
        zoom: 15,
        mapTypeControlOptions: {
          mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }

      }
    var map = new google.maps.Map(mapCanvas, mapOptions);
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');

    }
    google.maps.event.addDomListener(window, 'load', initialize);
