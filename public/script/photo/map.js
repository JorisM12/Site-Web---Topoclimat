let map = L.map('map').setView([coords[0], coords[1]], 13);
let photoMarker = L.icon({
    iconUrl: '/'+linkImg,
    iconSize: [50, 50], 
    iconAnchor: [0, 0], 
    popupAnchor: [0, 0],
    className: 'radius-icon'
})
let marker = L.marker([coords[0], coords[1]], {icon:photoMarker}).addTo(map);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);