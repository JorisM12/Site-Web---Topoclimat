const txtElem = document.querySelector('.txt');
const main  = document.querySelector('main');
const btnStart = document.querySelector('#start');
const btnNext = document.querySelector('#next');
const btnReset =  document.querySelector('#reset');
const allBack = document.querySelectorAll('.back');
const cloudElem = document.querySelector('#cloud');
const pluie1Elem = document.querySelector('#pluie1');
const pluie2Elem = document.querySelector('#pluie2');
const neige1Elem = document.querySelector('#neige1');
const neige2Elem = document.querySelector('#neige2');
const allFinalElems = document.querySelectorAll('.final');
let index = 0;
const listBack  = [];
allBack.forEach(elem =>{
    listBack.push(elem);
})
listBack[0].style.opacity = 1;
listBack[1].style.opacity = 1;
listBack[0].style.zIndex= 100;
listBack[1].style.zIndex= 50;
listBack[3].style.zIndex = 25;
listBack[4].style.zIndex = 25;
btnStart.addEventListener('click',()=>{
    btnStart.style.opacity = 0;
    txtElem.innerHTML = 'La perturbation arrive depuis l\'Atlantique..';
    txtElem.style.opacity = 1;
    cloudElem.style.display = 'block';
    listBack[0].style.animation = 'opacity 7s linear ';
    setTimeout(() => {
        txtElem.innerHTML = '';
        listBack[1].style.opacity = 1;
        listBack[0].style.opacity = 0;
        cloudElem.remove();
        btnNext.style.display = 'block';
    },5000);
})
btnNext.addEventListener('click',()=>{
    btnNext.style.display = 'none';
    if(index == 0) {
        txtElem.innerHTML = 'Les neige commence à tomber et blanchie la montagne';
        setTimeout(() => {
            listBack[1].style.animation = 'opacity 6s linear ';
            listBack[2].style.opacity = 1;
            pluie1Elem.style.display = 'block';
            pluie2Elem.style.display = 'block';
            neige1Elem.style.display = 'block';
            neige2Elem.style.display = 'block';
        },4000);
        setTimeout(() => {
            listBack[1].style.opacity = 0;
            btnNext.style.display = 'block';
        },7000);
    }else if(index == 1) {
        txtElem.innerHTML = 'La couche de neige est importante en montagne, les hauteurs de la région blanchissent aussi <br> mais la pluie domine la plaine';
        listBack[2].style.zIndex = 30;
        listBack[2].style.animation = 'opacity 7s linear ';
        listBack[3].style.opacity = 1;
        setTimeout(() => {
            listBack[2].style.opacity = 0;
            btnNext.style.display = 'block';
        },6000);
    }else if(index == 2) {
        txtElem.innerHTML = 'Cela s\'explique par l\' influence de l\'océan à basse altitude (zone rouge)';
        listBack[3].style.zIndex = 30;
        listBack[3].style.animation = 'opacity 4s linear ';
        listBack[4].style.opacity = 1;
        setTimeout(() => {
            listBack[3].style.opacity = 0;
            btnNext.style.display = 'block';
        },3000);
    }else if(index == 3) {
        txtElem.innerHTML = 'Voici le rôle des masses d\'air !';

        setTimeout(() => {
            allFinalElems.forEach(elem =>{
                elem.style.opacity = 1;
                btnReset.style.display = 'block';
            })  
        },3000);
    }
    index++;
})
btnReset.addEventListener('click',()=>{
    location.reload();
})
