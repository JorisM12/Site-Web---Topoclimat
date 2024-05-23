let map = L.map('map-1').setView([48.13, 6.95], 13);
let map2 = L.map('map-2').setView([46.13, 4.95], 13);
let marker = L.marker([48.13, 6.52]).addTo(map);
let markerB = L.marker([46.13, 4.95]).addTo(map2);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map2);

