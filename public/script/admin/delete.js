const btnsDelete =  document.querySelectorAll('.delete');
btnsDelete.forEach(btn=> {
    btn.addEventListener('click',()=>{
        deleteArticle(btn.dataset.link)
    });
});
function deleteArticle(link) {
    confirmation = confirm("Êtes-vous sûr de vouloir continuer ?");
    if (confirmation) {
        fetch(link);
    }
}