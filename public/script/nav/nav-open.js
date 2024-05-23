// Liste des boutons
const btnForcast = document.querySelector('nav#main-nav ul li:nth-child(2)');
const btnHomeBottomNav = document.querySelector('nav#mobile-nav ul li:first-child');
const btnRiskBottomNav = document.querySelector('nav#mobile-nav ul li:nth-child(2)');
const btnNewsBottomNav = document.querySelector('nav#mobile-nav ul li:nth-child(3)');

const btnCloseInfo = document.querySelector('#bloc-notif p img:last-child');
const blocNotif = document.querySelector('#bloc-notif');

// Liste des boutons de navigation mobile
const btnBurgerTab = document.querySelector('nav #burger-menu');
const btnBurger = document.querySelector('nav#mobile-nav ul li:last-child');
const btnCloseBurger = document.querySelector('img#btn-close');

// Boutons du menu burger ouvert
const btnForcastBurger = document.querySelector('nav#mobile-nav-open ul li:nth-child(2) a');
const btnForcastBurgerLi = document.querySelector('nav#mobile-nav-open ul li:nth-child(2)');

const btnNewsBurger = document.querySelector('nav#mobile-nav-open ul li:nth-child(3) a');
const btnNewsBurgerLi = document.querySelector('nav#mobile-nav-open ul li:nth-child(3)');

const btnPedagogieBurger = document.querySelector('nav#mobile-nav-open ul li:nth-child(5) a');
const btnPedagogieBurgerLi = document.querySelector('nav#mobile-nav-open ul li:nth-child(5)');

const btnStormBurger = document.querySelector('nav#mobile-nav-open ul li:nth-child(6) a');
const btnHomeBurger = document.querySelector('nav#mobile-nav-open ul li:nth-child(1) a');

// Liste des éléments
const navOpenElem = document.querySelector('nav#main-nav-open');
const navOpenElemList = document.querySelector('nav#main-nav-open ul');
// Menu burger
const navBurgerElem = document.querySelector('nav#mobile-nav-open');
const listElemUl = document.querySelector('nav#mobile-nav-open ul');

const listElemInForcast = ['Carte de prévisions','Météo ville par ville','Carte des risques météo','Météo des Vosges'];
const listLinkInForcast = ['/','/main/forcastCity','/riskMap','#'];
const listElemInNews = ['Dernier article','Liste des articles'];
const listLinkNews = ['#','/articles'];

const listElemInPedagogie = ['Les décharges au sol','Les chutes de neige sous influence océanique'];
const listLinkPedagogie = ['/schema/typesFoudre','/schema/neigeOceanique'];

let section = localStorage.getItem('section');
selectedBtn();

btnForcast.addEventListener('mouseenter', () => {
    navOpenElem.style.display = 'flex';
})

navOpenElemList.addEventListener('mouseleave', () => {
    navOpenElem.style.display = 'none';
})

btnNewsBurger.addEventListener('click',()=>{
    deleteMenu();
    createMenu(btnNewsBurger,btnNewsBurgerLi,listElemInNews,listLinkNews);
})

btnForcastBurger.addEventListener('click', () => {
    deleteMenu();
    createMenu(btnForcastBurger,btnForcastBurgerLi,listElemInForcast,listLinkInForcast);
})

btnPedagogieBurger.addEventListener('click',()=>{
    deleteMenu();
    createMenu(btnPedagogieBurger,btnPedagogieBurgerLi,listElemInPedagogie,listLinkPedagogie);
})

btnStormBurger.setAttribute('href','/storm');
btnHomeBurger.setAttribute('href','/');


btnBurger.addEventListener('click', () => {
    navBurgerElem.style.display = 'block';
    window.scrollTo(0, 0);
});
btnBurgerTab.addEventListener('click', () => {
    navBurgerElem.style.display = 'block';
});

btnCloseBurger.addEventListener('click', () => {
    navBurgerElem.style.display = 'none';
});

if(btnCloseInfo) {
    btnCloseInfo.addEventListener('click',()=>{
        blocNotif.remove();
    })
}

function createMenu(titleMenu,titleMenuLi,listElem = [], listLInk = []) {
    let index = 0;
    let newElemUl = document.createElement('ul');
    listElem.forEach((elem)=>{
        let newElemLi = document.createElement('li');
        let newElemLink = document.createElement('a');
        newElemLink.textContent = elem;
        newElemLink.href = listLInk[index];
        newElemLi.appendChild(newElemLink);
        newElemUl.appendChild(newElemLi);
        index++;
    })
    newElemUl.classList.add('new-menu-elem');
    titleMenu.classList.add('title-selected');
    titleMenuLi.appendChild(newElemUl)
}

function deleteMenu() {
    const menuToDelete = document.querySelectorAll('.new-menu-elem');
    const titleToDelete = document.querySelectorAll('.title-selected');
    menuToDelete.forEach((elem) =>{
        elem.remove();
    })
    titleToDelete.forEach((elem) =>{
        elem.classList.remove('title-selected');
    })
}
function selectedBtn() {
    btnHomeBottomNav.addEventListener('click',()=>{
        localStorage.setItem('section','home');
    });
    btnRiskBottomNav.addEventListener('click',()=>{
        localStorage.setItem('section','risk');
    });
    btnNewsBottomNav.addEventListener('click',()=>{
        localStorage.setItem('section','news');
    });

    switch (section) {
        case 'home':
            btnHomeBottomNav.classList.add('selected');
            btnRiskBottomNav.classList.remove('selected');
            btnNewsBottomNav.classList.remove('selected');
            break;
        case 'risk':
            btnHomeBottomNav.classList.remove('selected');
            btnRiskBottomNav.classList.add('selected');
            btnNewsBottomNav.classList.remove('selected');
            break;
        case 'news':
            btnHomeBottomNav.classList.remove('selected');
            btnRiskBottomNav.classList.remove('selected');
            btnNewsBottomNav.classList.add('selected');
            break;
    }
}
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});