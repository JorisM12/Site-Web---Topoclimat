const btnCloseInfo = document.querySelector('#bloc-notif p img:last-child');
const blocNotif = document.querySelector('#bloc-notif');

if(btnCloseInfo) {
    btnCloseInfo.addEventListener('click',()=>{
        blocNotif.remove(); 
    })
}