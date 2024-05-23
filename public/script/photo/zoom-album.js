const imgElem = document.querySelectorAll('#all-photo img');
const sectionElem = document.querySelector("body");
let linkImg;
let scrollTop;
const windowHeight = window.innerHeight;
if(windowWidth()) {
    imgElem.forEach(photo => {
        photo.addEventListener('click', async () => {
            scrollTop = document.documentElement.scrollTop;
            const photoName =  photo.dataset.name;
            await zoom(photoName.replace(/ /g,'-'));
        });
    });
}
function createImgModal(linkImg) {
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
function windowWidth() {
    let wWindow = window.innerWidth;
    if(wWindow <= 650) {
        return false;
    } else {
        return true;
    }
}
async function zoom(name) {
    try {
        const reponse = await fetch(`/gallery/viewPhoto/${id}/${name}`);
        const image = await reponse.json();
        sectionElem.style.overflow = 'hidden';
        createImgModal(image);
    } catch (error) {
        console.error("Une erreur s'est produite lors du chargement de l'image:", error);
        alert('Image introuvable');
    }
}

