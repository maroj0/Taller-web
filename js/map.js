console.log("entra papurri");
var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiNjRiaXRzanVhbiIsImEiOiJjbDJhcDVkdjMwN2d4M2pxbjRzaHY3NHlyIn0.JGc3z4I7Go_JgaZLc0VTkA'
}).addTo(map);
console.log("entra papurri abajo");