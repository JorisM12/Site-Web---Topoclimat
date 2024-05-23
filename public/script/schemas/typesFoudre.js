const back = document.querySelector('#back');
const flash = document.querySelector('.flash');

const descNeg = document.querySelector('#fdr1');
const descPos = document.querySelector('#fdr2');
const ascPos = document.querySelector('#fdr3');
const ascNeg = document.querySelector('#fdr4');
const trac = document.querySelector('#trc');

const descNegTxt = document.querySelector('#txt-fdr1');
const descPosTxt = document.querySelector('#txt-fdr2');
const ascPosTxt = document.querySelector('#txt-fdr3');
const ascNegTxt = document.querySelector('#txt-fdr4');
const tracTxt = document.querySelector('#txt-trc');

const descNegCharges = document.querySelector('#charges-fdr1');
const descPosCharges = document.querySelector('#charges-fdr2');
const ascPosCharges = document.querySelector('#charges-fdr3');
const ascNegCharges = document.querySelector('#charges-fdr4');

const txtElem = document.querySelector('.txt');
const main  = document.querySelector('main');
const btnStart = document.querySelector('#start');
const btnNext = document.querySelector('#next');
const btnReset =  document.querySelector('#reset');

const blocFdr1 = document.querySelector('#blocFdr1');
const blocFdr2 = document.querySelector('#blocFdr2');
const blocFdr3 = document.querySelector('#blocFdr3');
const blocFdr4 = document.querySelector('#blocFdr4');
const allBlocsFdr = document.querySelectorAll('.blocFdr');
const allBack = document.querySelectorAll('.back');
const listBack  = [];

allBack.forEach(elem =>{
    listBack.push(elem);
})

listBack[0].style.opacity = 1;
btnStart.addEventListener('click',run);
function run() {
    btnStart.remove();
    txtElem.style.opacity = '1';
    setTimeout(() => {
        txtElem.style.opacity = '0';
    }, 2000);
    setTimeout(() => {
        start(descNeg,'/style/images/schemas/storm/interactif/types_foudre/Schema_orage_fond1.png');
    }, 3000);
    setTimeout(() => {
        txtElem.innerHTML = 'Impact négatif descendant !';
        txtElem.style.opacity = '1';
    }, 4000);
    setTimeout(() => {
        txtElem.innerHTML = '';
        txtElem.style.opacity = '0';
        btnNext.style.display = 'block';
        clickBtn();
    }, 5500);
}
function viewInfos() {
    txtElem.innerHTML='Survolez le schéma pour plus d\'infos!';
    txtElem.style.opacity = '1';
    txtElem.style.position = 'absolute';
    txtElem.style.top = '818px';
    let num = 0;
    allBlocsFdr.forEach(blc =>{
        blc.addEventListener('mouseenter',()=>{
            num = blc.dataset.num
            if(num == 1) {
                activeInfos(descNeg,descNegTxt,descNegCharges);
            }else if (num == 2) {
                activeInfos(descPos,descPosTxt,descPosCharges);
            }else if (num == 3) {
                activeInfos(ascPos,ascPosTxt,ascPosCharges);
            }else if (num == 4) {
                activeInfos(ascNeg,ascNegTxt,ascNegCharges);   
            }else if (num == 5) {
                tracTxt.style.opacity='1';  
            }
        })
        blc.addEventListener('mouseleave',()=>{
            num = blc.dataset.num
            if(num == 1) {
                desactiveInfos(descNeg,descNegTxt,descNegCharges);
            }else if (num == 2) {
                desactiveInfos(descPos,descPosTxt,descPosCharges);
            }else if (num == 3) {
                desactiveInfos(ascPos,ascPosTxt,ascPosCharges);
            }else if (num == 4) {
                desactiveInfos(ascNeg,ascNegTxt,ascNegCharges);   
            }else if (num == 5) {
                tracTxt.style.opacity='0';    
            }
        })
    })
}
let index = 1;
function clickBtn() {
    btnNext.addEventListener('click',() =>{
        switch (index) {
            case 0:
                start(descNeg,1);
                break;
            case 1:
                start(descPos,2);
                viewTxt('Impact positif descendant !');
                break;
            case 2:
                start(ascPos,3,false);
                viewTxt('Impact positif ascendant !');
                break;
            case 3:
                btnNext.remove();
                start(ascNeg,4,false);
                viewTxt('Impact négatif ascendant !');
                setTimeout(() => {
                    trac.style.opacity = '1';
                    btnReset.style.display = 'flex';
                    viewInfos();
                }, 4500);
                break;
        }
        index++;
    })
}

function activeInfos(elem,elemTxt,elemChrg) {
    elem.classList.add('shadow');
    elem.style.opacity = '1';
    elemTxt.style.opacity = '1';
    elemChrg.style.opacity = '1';
    elemChrg.style.zIndex = 150;
    elem.style.zIndex = 150;
}

function desactiveInfos(elem,elemTxt,elemChrg) {
    elem.classList.remove('shadow');
    elem.style.opacity = '0';
    elemTxt.style.opacity = '0';
    elemChrg.style.opacity = '0';
    elemChrg.style.zIndex = 0;
    elem.style.zIndex = 0;
}

function viewTxt(text,delayOn = 1500, delayOff = 4000) {
    btnNext.style.display = 'none';
    setTimeout(() => {
        txtElem.innerHTML = text;
        txtElem.style.opacity = '1';
    }, delayOn);
    setTimeout(() => {
        txtElem.innerHTML = '';
        txtElem.style.opacity = '0';
        btnNext.style.display = 'block';
    }, delayOff);
}

function start(foudre,numBack, isDesc = true) {
    flash.style.animation = '';
    foudre.style.opacity = '1';
    if (isDesc) {
        foudre.style.animation = 'animeDsc 0.5s';
        setTimeout(() => {
            flash.style.animation = 'flash 0.2s linear';
            listBack[numBack].style.opacity = 1;
            listBack[numBack-1].style.opacity = 0;
            foudre.style.opacity = '0';
        }, 100);
    } else {
        foudre.style.animation = 'animeAsc 0.5s';
        setTimeout(() => {
            listBack[numBack].style.opacity = 1;
            listBack[numBack-1].style.opacity = 0;
            foudre.style.opacity = '0';
        }, 150);
    }
}
btnReset.addEventListener('click',()=>{
    location.reload();
})
