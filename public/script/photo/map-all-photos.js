console.log(links[0][1]);
let position = links[0][1];
let map = L.map('map').setView(position, 8);

for (const indexPhoto in links) {
    let photoMarker = L.icon({
        iconUrl: '/'+links[indexPhoto][0],
        iconSize: [50, 50], 
        iconAnchor: [0, 0], 
        popupAnchor: [0, 0],
        className: 'radius-icon',
    });

    let marker = L.marker([links[indexPhoto][1][0], links[indexPhoto][1][1]], {icon: photoMarker}).addTo(map);

    function openLink() {
        window.open('/storm/photo/'+links[indexPhoto][2]+'/'+links[indexPhoto][3], '_blank');
    }
    marker.on('click', openLink);
}

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);