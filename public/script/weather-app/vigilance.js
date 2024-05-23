const blocVigi = document.querySelector('section#alerts-and-news #vigilance');
const blocVigiMob  = document.querySelector('#alerts-mobile div:last-child');
const txtVigi =  document.querySelector('section#alerts-and-news #vigilance > p');
txtVigi.innerHTML = 'Chargement en cours...';
blocVigi.style.backgroundColor = 'grey';
blocVigiMob.style.backgroundColor = 'grey';
blocVigi.addEventListener('click',()=>{
    window.open("https://vigilance.meteofrance.fr/fr", '_blank');
})
async function dataVigi(link = '/forcasts/apiMeteoFrance') { 
    try {
        const response = await fetch(link);
        if (!response.ok) {
            throw new Error('Erreur dans la réception des données');
        }
        const responseData = await response.json();
        const dataVigi = JSON.parse(responseData);
        createInfoVigi(dataVigi);
        return dataVigi;
    } catch (error) {
        console.error('Erreur dans la lecture des données:', error);
        throw error; 
    }
};
dataVigi();
function createInfoVigi(level) {
    switch (level) {
        case 0:
            blocVigi.style.backgroundColor = 'yellowgreen';
            blocVigiMob.style.backgroundColor = 'yellowgreen';
            txtVigi.innerHTML = "Pas de vigilance en cours"
            break;
        case 2:
            blocVigi.style.backgroundColor = 'yellow';
            blocVigiMob.style.backgroundColor = 'yellow';
            txtVigi.innerHTML = "Vigilance jaune en cours"
            break;
        case 3:
            blocVigi.style.backgroundColor = 'orange';
            blocVigiMob.style.backgroundColor = 'orange';
            txtVigi.innerHTML = "Vigilance orange en cours"
            break;
        case 4:
            blocVigi.style.backgroundColor = 'red';
            blocVigiMob.style.backgroundColor = 'red';
            txtVigi.innerHTML = "Vigilance rouge en cours"
            break;
    }
}