<section id="photo" class="container-type-1">
    <h2 class="title-type-1"><?=$infosPhoto->name_photo?></h2>
    <img src="/<?=$linkImg->link_photo?>" alt="alt de la photo">
    <form action="/admin/photoManage/<?=$infosPhoto->id_photo?>" method="post">
        <div>
            <label for="title_photo">TITRE</label>
            <input type="text" id="name_photo" name="name_photo" class="input-type-1" value="<?=$infosPhoto->name_photo?>" required>
        </div>
        <div id="coords">
            <div>
                <label for="lat-photo">Latitude</label>
                <input type="text" name="lat-photo" id="lat-photo"  value="<?=$coords[0]?>" class="input-type-1" required>
            </div>
            <div>
                <label for="lon-photo">Longitude</label>
                <input type="text" name="lon-photo" id="lon-photo" value="<?=$coords[1]?>" class="input-type-1" required> 
            </div>
            <div class="location">
                <img src="/style/images/pictos/elements/location.png" alt="" id="loc"">
            </div>
        </div>
        <div>
            <label for="alt-photo">Alt de la photo</label>
            <input type="text" id="alt-photo" name="alt-photo" class="input-type-1" value="<?=$infosPhoto->alt_photo?>" required>
        </div>
        <div class="description">
            <label for="description_photo">Description</label>
            <textarea name="description_photo" id="description_photo" cols="30" rows="10" class="input-type-1" required> <?=$infosPhoto->description_photo?></textarea> 
        </div>
        <div id="check">
            <input type="checkbox" id="is_active_photo" name="is_active_photo" <?=$infosPhoto->is_active_photo ? 'checked' : ''?>/>
            <label for="is_active_photo">Photo visible</label>
        </div>
        <input type="hidden" name="form" id="form" value="send">
        <button type="submit" class="button-type-2">VALIDER</button>
    </form>
</section>
<script>
const main = document.querySelector('main');
const allLocationElem = document.querySelector('div.location img');
allLocationElem.addEventListener('click',()=>{
    createMap();
})

function createMap(numBloc) {
    let newMap = document.createElement('div');
    newMap.id = 'map';
    newMap.style.top ='-1000px';
    newMap.style.left ='40%';
    main.appendChild(newMap);
    const lat = document.querySelector("div#coords div:first-child input");
    const lon = document.querySelector("input#lon-photo");
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
</script>