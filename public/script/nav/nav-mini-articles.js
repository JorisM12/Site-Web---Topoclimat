const btnNavRight = document.querySelectorAll('section article #nav-news div:last-child');
const btnNavLeft = document.querySelectorAll('section article #nav-news div:first-child');
const articleFirstElem = document.querySelector('#art1');
const articleMiddleElem = document.querySelector('#art2');
const articleLastElem = document.querySelector('#art3');
let index = 0;
btnNavRight.forEach(nav => {
    nav.addEventListener('click',()=>{
        navArticles('right')
    });
});
btnNavLeft.forEach(nav => {
    nav.addEventListener('click',()=>{
        navArticles('left')
    });
});
function navArticles(dir) {
    if(dir == 'left') {
        index--;
    }else{
        index++;
    }
    index > 2 ? index = 0 : index = index;
    index < 0 ? index = 0 : index = index;
    if(index === 0) {
        articleFirstElem.style.display = 'flex';
        articleMiddleElem.style.display = 'none';
        articleLastElem.style.display = 'none';
    }else if(index === 1) {
        articleFirstElem.style.display = 'none';
        articleMiddleElem.style.display = 'flex';
        articleLastElem.style.display = 'none';
    }else if(index === 2) {
        articleMiddleElem.style.display = 'none';
        articleLastElem.style.display = 'none';
        articleLastElem.style.display = 'flex';
    }
}