const main = document.querySelector('main');
const allLocationElem = document.querySelectorAll('div.location img');
allLocationElem.forEach(loc =>{
    loc.addEventListener('click',()=>{
        createMap(loc.dataset.loc);
    })
})

function createMap(numBloc) {
    let newMap = document.createElement('div');
    newMap.id = 'map';
    newMap.style.top = scrollTp() + 'px';
    main.appendChild(newMap);
    const lat = document.querySelector("[data-bloc='"+numBloc+"'] div:first-child input");
    const lon = document.querySelector("[data-bloc='"+numBloc+"'] div:nth-child(2) input");
    startMap(lat,lon);
}
function startMap(latInput,lonInput) {
    const map = L.map('map').setView([49.14, 6.13], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    function onMapClick(e) {
        const lat = e.latlng.lat;
        const lon = e.latlng.lng;
        const divMap = document.querySelector('#map');
        latInput.value = lat.toFixed(2);
        lonInput.value = lon.toFixed(2);
        divMap.remove();
    }
    map.on('click', onMapClick);
}
