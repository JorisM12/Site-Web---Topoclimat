<div id="banners">
    <h2>USA 2024</h2>
    <h3>Carnet de bord</h3>
</div>
<section>
    <p>Deux membres de l'équipe TopoClimat seront dans la Tornado Alley cette année! Ils réaliseront chacuns un voyage avec une approche différente pour saisir au plus prêt la force des éléments..</p>
    <p>
        Découvrez l'avancement de leurs voyage dans leur section dédiée.
    </p>
    <div id="bloc-rows">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    <div id="bloc-cards">
        <div class="card">
            <img src="/style/images/storm/USA/jordan.png" alt="Image de présentation">
            <div class="btn-cover">
                <a href="/storm/editoUsa/7/2024-04-24" title="Voir le récit de Jordan" class="btn-view">VOIR</a>
            </div>
            <h4>Équipe 1</h4> 
        </div>
        <div class="card">
            <img src="/style/images/storm/USA/loic.png" alt="Image de présentation">
            <div class="btn-cover">
                <a href="/storm/editoUsa/8/2024-04-24" title="Voir le récit de Loic" class="btn-view">VOIR</a>
            </div>
            <h4>Équipe 2</h4> 
        </div>
    </div>
</section>
<?php if(isset($_SESSION['user']) && in_array(2,json_decode($_SESSION['user']['roles']))):?>
    <aside style="display:flex;justify-content: center;  width: 100%;">
        <a href="/storm/addEdito" style="font-size: 1.5em; font-weight: bold; text-decoration: none; padding: 10px;" class="button-type-2">AJOUTER UN EDITO</a>
    </aside>
<?php endif ?>
<script>
    const cards = document.querySelectorAll('.card');
    const allBtnsCard = document.querySelectorAll('.btn-cover');

    if(window.innerWidth > 1000) {
        cards[0].addEventListener('mouseenter',()=>{
        allBtnsCard[0].style.display = 'flex';
        })
        cards[1].addEventListener('mouseenter',()=>{
            allBtnsCard[1].style.display = 'flex';
        })
        cards[0].addEventListener('mouseleave',()=>{
            allBtnsCard[0].style.display = 'none';
        })
        cards[1].addEventListener('mouseleave',()=>{
            allBtnsCard[1].style.display = 'none';
        })
        console.log(window.innerWidth);
    }else{
        cards[0].addEventListener('click', () => {
            window.location.href = '#'; 
        });
        cards[1].addEventListener('click', () => {
            window.location.href = '#'; 
        });
    }
</script>