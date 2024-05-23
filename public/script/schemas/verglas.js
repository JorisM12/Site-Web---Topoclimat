const txtElem = document.querySelector('.txt');
const main  = document.querySelector('main');
const btnStart = document.querySelector('#start');
const btnNext = document.querySelector('#next');
const btnReset =  document.querySelector('#reset');
const allBack = document.querySelectorAll('.back');
const listBack  = [];
allBack.forEach(elem =>{
    listBack.push(elem);
})
const cloudElem = document.querySelector('#cloud');
const pluie1Elem = document.querySelector('#pluie1');
const pluie2Elem = document.querySelector('#pluie2');
const ventFroid = document.querySelector('#txt-vent-froid');
const arrowCold = document.querySelector('#arrow-pol-sol');
const arrowHot = document.querySelector('#arrow-oce-alti');
const txtHot = document.querySelector('#txt-vent-chaud');

let index = 1;

listBack[0].style.opacity = 1;
listBack[0].style.zIndex = 55;
listBack[1].style.zIndex = 50;
btnStart.addEventListener('click',()=>{
    start();
})
btnReset.addEventListener('click',()=>{
    location.reload();
})

function start() {
    btnStart.remove();
    txtElem.innerHTML = 'Un temps froid et sec est présent sur le Nord de la France';
    txtElem.style.opacity = 1;
    setTimeout(() => {
        btnNext.style.display = 'block';
    },2000);
    btnNext.addEventListener('click',()=>{
        btnNext.style.display = 'none';
        next(index);
        index++;
    })
}
function next(index) {
    switch (index) {
        case 1:
            txtElem.innerHTML = 'Un vent d\'Est froid et persistant est présent au niveau du sol';
            ventFroid.style.display = 'block';
            arrowCold.style.display = 'block';
            setTimeout(() => {
                btnNext.style.display = 'block';
            },3000);
            break;
        case 2:
            txtElem.innerHTML = 'Une perturbation pluvieuse arrive depuis l\'Océan';
            cloudElem.style.display = 'block';
            listBack[0].style.animation = 'opacity 7s linear ';
            listBack[1].style.opacity = 1;
            setTimeout(() => {
                txtElem.innerHTML = '';
                listBack[0].style.opacity = 0;
                cloudElem.remove();
                btnNext.style.display = 'block';
            },5000);
            break;
        case 3:
            txtElem.innerHTML = 'Elle apporte avec elle de l\'air doux en altitude et de la pluie';
            listBack[1].style.animation = 'opacity 7s linear ';
            listBack[2].style.opacity = 1;
            pluie1Elem.style.display = 'block';
            pluie2Elem.style.display = 'block';
            setTimeout(() => {
                txtElem.innerHTML = '';
                listBack[1].style.opacity = 0;
                btnNext.style.display = 'block';
            },5000);
            break;
        case 4:
            txtElem.innerHTML = 'L\'air doux est bloqué en altitude par le vent froid au sol';
            arrowHot.style.display = 'block';
            txtHot.style.display = 'block';
            listBack[1].style.animation = 'opacity 7s linear ';
            listBack[2].style.opacity = 1;
            setTimeout(() => {
                txtElem.innerHTML = '';
                listBack[1].style.opacity = 0;
                btnNext.style.display = 'block';
            },5000);
            break;
        case 5:
            txtElem.innerHTML = 'La pluie tombe sur des sols gelés et de la glace se forme continuellement...';
            listBack[4].style.animation = 'opacity-invert 7s linear ';
            setTimeout(() => {
                txtElem.innerHTML = '';
                listBack[2].style.opacity = 0;
                listBack[4].style.opacity = 1;
                btnReset.style.display = 'block';
            },7000);
            break;
        default:
            break;
    }
}