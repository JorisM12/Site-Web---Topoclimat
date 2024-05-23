<section id="container-forcast" class="container-type-1">
    <h2 class="title-type-1">La météo dans votre ville !</h2>
    <section id="forcast-city">
        <div id="search-city">
            <form action="forcastCity" method="get">
                <div>
                    <input class="input-type-1" type="text" placeholder="Nom de la ville" name="name_city" id="cityName">
                    <div id="suggestions"></div>
                </div>
                <p id="error-info">Erreur de saisie</p>
                <input type="hidden" name="coords" value="" id="coords">
                <button class="button-type-2" type="button">Rechercher</button>
            </form>
        </div>
        <h3 class="title-type-1"></h3>
        <section id="container-cards">
        </section>
    </section>
</section>
<script src="/script/weather-app/cityForcastSearch.js"></script>
<script src="/script/weather-app/constants.js"></script>
<script src="/script/weather-app/city-suggestion.js"></script>
