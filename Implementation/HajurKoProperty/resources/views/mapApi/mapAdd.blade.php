
    <link href="{!! asset('Links/css/bootstrap.css') !!}" rel="stylesheet" />
    <link href="{!! asset('Links/css/bootstrap.min.css') !!}" rel="stylesheet" />

    <script type="text/javascript" src=" {{ asset('map/jq/mapjquery.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt5qEgrDwWOoZwfQE2vKjimX8Fn8a3wCA&callback=initMap" type="text/javascript"></script>

    <style>
        #map-canvas {
            width: 350px;
            height: 250px;
        }
    </style>

    <h1>Map API Practice</h1>
    <div class="container">
        <form action="mapApi"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control input-sm" name="title">
            </div>

            <div class="form-group">
                <label for="">Map</label>
                <input type="text" id="searchmap">
                <div id="map-canvas"></div>
                {{-- <div id="map" class="container-fluid" style="height:60vh"></div> --}}
            </div>

            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control input-sm" name="title" id="lat">
            </div>
            
            <div class="form-group">
                <label for="">lng</label>
                <input type="text" class="form-control input-sm" name="title" id="lng">
            </div>

            <button class="btn btn-success pl-5 pr-5"> Save </button>
        </form>
    </div>

<Script>
    // var map = new google.maps.Map(document.getElementById('map-canvas'){
    //     center:{
    //         lat: 27.72,
    //         lng: 85.36
    //     },
    //     zoom:15 
    // });
    function initMap() {
        var uluru = {lat: 27.680640, lng: 85.332552}; //location
        var map = new google.maps.Map(document.getElementById('map-canvas'), 
        {
            zoom: 15, 
            center: uluru
        });
        var marker = new google.maps.Marker(
        {
            position: uluru,
            map: map,
            draggable: true;
        });
    }
</Script>