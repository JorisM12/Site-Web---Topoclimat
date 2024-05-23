const apiUrl = 'https://geo.api.gouv.fr/communes?nom=';
const suggestionsCity = document.querySelector('#suggestions');
const cityInput = document.querySelector('form input');
const cityCoordsInput = document.querySelector('#coords');
cityInput.addEventListener('input', () => {
const inputValue = cityInput.value.trim();
if (inputValue.length >= 2) {
  suggestionsCity.style.display = 'block';
  fetch(apiUrl + inputValue + '&fields=codesPostaux,mairie&boost=population&limit=5')
    .then(response => response.json())
    .then(data => {
        if(data.length > 0) {
            let coords = [];
            coords.push(data[0].mairie.coordinates[0]);
            coords.push(data[0].mairie.coordinates[1]);
            displaySuggestions(data,coords);
        }
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
} else {
  suggestionsCity.innerHTML = '';
  suggestionsCity.style.display = 'none';
}
});
function displaySuggestions(suggestions,coords) {
    suggestionsCity.innerHTML = '';
    suggestions.forEach(suggestion => {
    const suggestionCity = document.createElement('div');
    suggestionCity.className = 'autocomplete-suggestion';
    suggestionCity.textContent = suggestion.nom+' '+suggestion.codesPostaux;
    suggestionCity.addEventListener('click', () => {
    suggestionsCity.style.display = 'none';
        let codePostale = suggestion.codesPostaux;
        cityInput.value = suggestion.nom + ' ' + codePostale[0];
        suggestionsCity.innerHTML = '';
        cityCoordsInput.value = coords;

    });
        suggestionsCity.appendChild(suggestionCity);
    });
}