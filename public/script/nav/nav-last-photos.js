const linkImg = document.querySelector('#last-photos .main-img');
const navRight =  document.querySelector('#last-photos #bloc-arrow img:last-child');
const navLeft =  document.querySelector('#last-photos #bloc-arrow img:first-child');
const listChip = document.querySelectorAll('#last-photos #bloc-nav div');
let index  = 0;
linkImg.setAttribute('src',listLink[index]);
navRight.addEventListener('click', ()=>{
    if(index > 3) {
        index = 0;
    }
    linkImg.setAttribute('src',listLink[index]);
    listChip.forEach(chip => {
        chip.classList.remove('selected');
    });
    listChip[index].classList.add('selected');
    index++;
})
navLeft.addEventListener('click', ()=>{
    if(index < 0) {
        index = 3;
    }
    listChip.forEach(chip => {
        chip.classList.remove('selected');
    });
    listChip[index].classList.add('selected');
    linkImg.setAttribute('src',listLink[index]);
    index-=1;
})