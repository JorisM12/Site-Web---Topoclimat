const blocImg = document.querySelector('#bloc-img');
const img = document.querySelector('#bloc-img img.img');
const sectionElem = document.querySelector("body");
const glassElem = document.querySelector('div#img-zoom');
let scrollTop;
const windowHeight = window.innerHeight;
if(windowWindth()) {
    blocImg.addEventListener('click',()=>{
        zoom(img)
    })
    blocImg.addEventListener('mouseenter',()=>{
        glassElem.style.display='flex';
    })
    blocImg.addEventListener('mouseleave',()=>{
        glassElem.style.display='none';
    })
}
function zoom() {
    scrollTop = document.documentElement.scrollTop;
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
    newImg.setAttribute('src',linkImg)
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