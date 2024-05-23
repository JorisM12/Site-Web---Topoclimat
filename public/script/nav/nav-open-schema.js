const btnStormSection = document.querySelector('nav#nav-schema div:first-child');
const btnSnowSection= document.querySelector('nav#nav-schema div:nth-child(2)');
const btnWeatherSection= document.querySelector('nav#nav-schema div:nth-child(6)');
const blocSnowSection = document.querySelector('nav#nav-schema div:nth-child(2)');
const blocWeatherSection = document.querySelector('nav#nav-schema div:nth-child(6)');
const listElemInStorm = ['Les décharges au sol','La grêle',"Les types d'orages (à venir..)"];
const listLinkInStorm = ['typesFoudre','grele','#'];
const listElemInSnow = ['Les chutes de neige sous influence océanique','La pluie verglaçante','L\'effet d\'isothermie (à venir..)'];
const listLinkSnow = ['neigeOceanique','pluieVerglas','#'];
const listElemInWeather = ['Les nuages noctulescents'];
const listLinkWeather = ['noctu'];
const imgHD = document.querySelector('div#bloc-img');

if(window.innerWidth < 650) {
    imgHD.addEventListener('click',()=>{
        window.open(linkImg, "_blank");
    })
}
let elemSelect;
if(page.length > 0) {
    switch (page[0]) {
        case 'snow':
            createMenuSchema(btnSnowSection,blocSnowSection,listElemInSnow,listLinkSnow);
            switch (page[1]) {
                case '1':
                    elemSelect = document.querySelector('.list-open li:nth-child(1)');
                    elemSelect.style.fontWeight = 'bold';
                    break;
                case '2':
                    elemSelect = document.querySelector('.list-open li:nth-child(2)');
                    elemSelect.style.fontWeight = 'bold';
                    break;
            }
            break;
        case 'storm':
            createMenuSchema(btnStormSection,btnStormSection,listElemInStorm,listLinkInStorm);
            switch (page[1]) {
                case '1':
                    elemSelect = document.querySelector('.list-open li:nth-child(1)');
                    elemSelect.style.fontWeight = 'bold';
                    break;
                case '2':
                    elemSelect = document.querySelector('.list-open li:nth-child(2)');
                    elemSelect.style.fontWeight = 'bold';
                    break;
            }
            break;
    }
}
btnStormSection.addEventListener('click', () => {
    deleteMenuSchema();
    createMenuSchema(btnStormSection,btnStormSection,listElemInStorm,listLinkInStorm);
});
btnSnowSection.addEventListener('click', () => {
    deleteMenuSchema();
    createMenuSchema(btnSnowSection,blocSnowSection,listElemInSnow,listLinkSnow);
});
btnWeatherSection.addEventListener('click', () => {
    deleteMenuSchema();
    createMenuSchema(btnWeatherSection,blocWeatherSection,listElemInWeather,listLinkWeather);
});
function createMenuSchema(titleMenu,titleMenuLi,listElem = [], listLInk = []) {
    let index = 0;
    let newElemUl = document.createElement('ul');
    listElem.forEach((elem)=>{
        let newElemLi = document.createElement('li');
        let newElemLink = document.createElement('a');
        let img = document.createElement('img');
        img.setAttribute('src','/style/images/pictos/nav/chevron-right-solid.svg');
        newElemLink.textContent = elem;
        newElemLink.href = listLInk[index];
        newElemLink.appendChild(img);
        newElemLi.appendChild(newElemLink);
        newElemUl.appendChild(newElemLi);
        index++;
    })
    newElemUl.classList.add('list-open');
    titleMenu.classList.add('title-selected');
    titleMenuLi.appendChild(newElemUl)
}
function deleteMenuSchema() {
    const menuToDelete = document.querySelectorAll('.list-open');
    const titleToDelete = document.querySelectorAll('.title-selected');
    menuToDelete.forEach((elem) =>{
        elem.remove();
    })
    titleToDelete.forEach((elem) =>{
        elem.classList.remove('title-selected');
    })
}



