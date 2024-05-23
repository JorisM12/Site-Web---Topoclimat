const btnSubmit  = document.querySelector('form button');
const loader = document.querySelector('#loader');
const inputs = document.querySelectorAll('input');
const txtAreas = document.querySelectorAll('textarea');

btnSubmit.addEventListener('click',()=>{
    if(isComplete()) {
        loader.style.top = scrollTp()+(window.innerHeight / 4)+ 'px';
        loader.style.display = 'flex';
    }
})
function scrollTp() {
    let scroll = document.documentElement.scrollTop;
    return scroll;
}
loader.style.top = scrollTp()+(window.innerHeight / 4)+ 'px';
function isComplete() {
    let state = true;
    inputs.forEach(input =>{
        if(input.value == '') {
            state = false;
        }
    })
    txtAreas.forEach(txt =>{
        if(txt.value == '') {
            state =  false;
        }
    })
    return state;
}