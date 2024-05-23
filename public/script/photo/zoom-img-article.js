const allFig = document.querySelectorAll('figure');
const allImg = document.querySelectorAll('figure img.img');
const sectionElem = document.querySelector("body");
const blocImg = document.querySelectorAll('figure div:first-child');
const glassElem = document.querySelectorAll('article section figure div.img-zoom');
let linkImg;
let scrollTop;
const windowHeight = window.innerHeight;

if(windowWindth()) {
    blocImg.forEach(img => {
        console.log(img.children);
        img.addEventListener('click',()=>{
            zoom(img.children[1]);
        })
        img.addEventListener('mouseenter',()=>{
            img.children[0].style.display='flex';
            console.log('ok');
        })
        img.addEventListener('mouseleave',()=>{
            img.children[0].style.display='none';
        })
    });
}
async function zoom(img) {
    const reponse = await fetch(`/articles/zoomImg/${id}/${img.dataset.num}`);
    const image = await reponse.json();
    scrollTop = document.documentElement.scrollTop;
    linkImg = image;
    createImgModal();
    sectionElem.style.overflow = 'hidden';
}
function createImgModal() {
    let modal = document.createElement('div');
    let newImg = document.createElement('img');
    let closeElem = document.createElement('div');
    closeElem.classList.add('close-elem');
    closeElem.classList.add('button-type-1');
    closeElem.innerText = 'FERMER';
    modal.style.top = scrollTop+'px';
    newImg.setAttribute('src','/'+linkImg)
    newImg.classList.add('new-img');
    newImg.style.height = windowHeight + 'px';
    modal.appendChild(newImg);
    modal.appendChild(closeElem);
    modal.classList.add('img-zoom');
    sectionElem.appendChild(modal);
    closeElem.addEventListener('click', ()=> {
        modal.remove();
        sectionElem.style.overflow = 'auto';
    })
}
function windowWindth() {
    let wWindow = window.innerWidth;
    if(wWindow <= 650) {
        return false;
    } else {
        return true;
    }
}