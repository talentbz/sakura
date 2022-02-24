$(document).ready(function () {
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGFuaWxhYiIsImEiOiJjbDAwaTk1a2owa2Q0M2x0OGtvc3hjc2t0In0.gmilwByvO7UW5lhwWiszfw';
        const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-74.5, 40], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });
})