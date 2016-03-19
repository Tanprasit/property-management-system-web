function initMap() {
    // Get lat and long
    var lat = $('#lat').val();
    var long = $('#long').val();
    var device = $('#device').val();
    
    var myLatLng = { lat: Number(lat), lng: Number(long) }
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
      center: myLatLng,
      zoom: 8
    });

    var marker = new google.maps.Marker({
       position: myLatLng,
       map: map,
       title: device
     });
}