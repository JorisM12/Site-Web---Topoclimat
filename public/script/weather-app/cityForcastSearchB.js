const parentElem = document.querySelector('#forcast-city section');
const beforeNodeCard = document.querySelector('#forcast-city');
const cityName = document.querySelector('h3');
const errorElem = document.querySelector('#error-info');
let cards = {};

function start() {
    deleteWeatherCard();
    const t = city(48.06,6.88,'');
    t.then(response=>{
        setTimeout(()=>{
            let index = '1';
            for (const key in cards) {
                let dateJ = 'J'+index;
                let dayWeek = todayDate(dateJ, true);
                index++;
                createWeatherCard(cards[key], 'J1', dayWeek);
            }
        },1000);
    });  
}

async function startCard(start,numDay = 'J1', lat ='48.06', lon = '6.88' ,day = 0) {
    deleteWeatherCard();
    fetch('https://api.open-meteo.com/v1/dwd-icon?latitude='+lat+'&longitude='+lon+'&hourly=temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m,wind_gusts_10m&timezone=Europe%2FLondon&start_date='+start+'&end_date='+start)
    .then(response => {
    if (!response.ok) {
        throw new Error('Erreur dans la récéption des données');
    }
    return response.json();
    })
    .then(data => {
        let y = data.hourly;
        let arrayData = [];
        let arrayDataPeriod = {};
        let hour = {};
        for (let index = 6 ; index < 12; index++) {
            let time = y['time'][index]
            if(weatherPeriod(parseInt(stmtPeriod(time)[1])) == 'morning') {
                arrayData.push(y['temperature_2m'][index]);
                arrayData.push(y['relative_humidity_2m'][index])
                arrayData.push(y['weather_code'][index])
                arrayData.push(y['wind_speed_10m'][index])
                arrayData.push(y['wind_gusts_10m'][index])
                hour[time] = arrayData;
                arrayDataPeriod['morning'] = hour;
                arrayData = [];
            }
        }
        hour = {};
        for (let index = 12 ; index < 18; index++) {
            
            let time = y['time'][index]
            if(weatherPeriod(parseInt(stmtPeriod(time)[1])) == 'afternoon') {
                arrayData.push(y['temperature_2m'][index]);
                arrayData.push(y['relative_humidity_2m'][index])
                arrayData.push(y['weather_code'][index])
                arrayData.push(y['wind_speed_10m'][index])
                arrayData.push(y['wind_gusts_10m'][index])
                hour[time] = arrayData;
                arrayDataPeriod['afternoon'] = hour;
                arrayData = [];
            }
        }
        let numDayB = numDay.substring(1);
        cards[numDayB] = arrayDataPeriod;
    })
    .catch(error => {
        console.error('Erreur dans la lecture des données:', error);
        errorElem.style.display = 'block';
        cityName.style.display = 'none';
        
    });
}
function deleteWeatherCard() {
    const elements = document.querySelectorAll(".weather-card");
    elements.forEach(element => {
        element.remove();
    });
}
function stmtPeriod(date) {
    const day = date.split('T');
    return day;
}
function weatherPeriod(time) {
    if(time > 0o6 && time <= 12) {
        return 'morning';
    } else if(time > 12 && time <= 18) {
        return 'afternoon';
    } else {
        return false;
    }
}
async function city(lat ='48.06', lon = '6.88', city='') {
    let J1 = getNextDays(0);
    let J2 = getNextDays(1);
    let J3 = getNextDays(2);
    let J4 = getNextDays(3);
    let J5 = getNextDays(4);
    let J6 = getNextDays(5);
    
    startCard(J1, 'J1', lat, lon, todayDate('J1', true));
    startCard(J2, 'J2', lat, lon, todayDate('J2', true));
    startCard(J3, 'J3', lat, lon, todayDate('J3', true));
    startCard(J4, 'J4', lat, lon, todayDate('J4', true));
    startCard(J5, 'J5', lat, lon, todayDate('J5', true));
    startCard(J6, 'J6', lat, lon, todayDate('J6', true));
    cityName.textContent = city;
    return true;
}

function getNextDays(numDays) {
    let currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + numDays);
    let year = currentDate.getFullYear();
    let month = String(currentDate.getMonth() + 1).padStart(2, '0');
    let day = String(currentDate.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}


function todayDate(nextDay = 'J1', day = false) {
    let nextDayIndex = 0
    switch (nextDay) {
        case 'J1':
            nextDayIndex = 0;
            break;
        case 'J2':
            nextDayIndex = 1;
            break;
        case 'J3':
            nextDayIndex = 2;
            break;
        case 'J4':
            nextDayIndex = 3;
            break;
        case 'J5':
            nextDayIndex = 4;
            break;
        case 'J6':
            nextDayIndex = 5;
            break;
    }

    if(day == true) {
        options = { weekday: 'long'};
    }else {
        options = { weekday: 'long', month: 'long', day: 'numeric' };
    }
    const currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + nextDayIndex);
    const finalDate = currentDate.toLocaleDateString('fr-FR', options);
    return finalDate;
};


function createWeatherCard(data = 0,numDay,dateDay) {
    let morningData = [];
    let listWW = [];
    for (let time in data.morning) {
        morningData.push(data.morning[time]);
        listWW.push(data.morning[time][2]);
    }
    let afternoonData = [];
    for (let time in data.afternoon) {
        afternoonData.push(data.afternoon[time]);
        listWW.push(data.afternoon[time][2]);
    }
    let card = document.createElement('div');
    let  day = document.createElement('p');
    let blocWeather = document.createElement('div');
    let divInBlocWeather = document.createElement('div');
    let separator = document.createElement('div');
    let divInBlocWeatherB = document.createElement('div');
    let imgBlocWeather = document.createElement('img');
    let txtInBlocWeather = document.createElement('p');
    let imgBlocWeatherB = document.createElement('img');
    let txtInBlocWeatherB = document.createElement('p');
    let blocWind = document.createElement('div');
    let imgBlocWind = document.createElement('img');
    let textBlocWind = document.createElement('p');
    let spanBlocWind = document.createElement('span');
    let blocWeet = document.createElement('div');
    let imgBlocWeet = document.createElement('img');
    let txtBlocWeet = document.createElement('p');
    let blocRain = document.createElement('div');
    let imgBlocRain = document.createElement('img');
    let txtBlocRain = document.createElement('p'); 

    blocWeather.classList.add('bloc-weather');
    imgBlocWeather.setAttribute('src',WEATHER_INTERPRETATION_PICTO[morningData[2][2]]);
    txtInBlocWeather.textContent=Math.round(morningData[0][0]);
    divInBlocWeather.appendChild(imgBlocWeather);
    divInBlocWeather.appendChild(txtInBlocWeather);
    blocWeather.appendChild(divInBlocWeather);
    
    separator.classList.add('separator');
    blocWeather.appendChild(separator);
    blocWeather.appendChild(divInBlocWeatherB);

    imgBlocWeatherB.setAttribute('src',WEATHER_INTERPRETATION_PICTO[afternoonData[3][2]]);
    txtInBlocWeatherB.textContent= Math.round(afternoonData[3][0]);
    divInBlocWeatherB.appendChild(imgBlocWeatherB);
    divInBlocWeatherB.appendChild(txtInBlocWeatherB);
    blocWeather.appendChild(divInBlocWeatherB);

    blocWind.classList.add('bloc-wind');
    imgBlocWind.setAttribute('src','/style/images/pictos/risk/wind.png');
    textBlocWind.textContent=Math.round(afternoonData[0][3])+'km/h ';
    spanBlocWind.textContent = '('+Math.round(afternoonData[0][4])+')';
    blocWind.appendChild(imgBlocWind);
    textBlocWind.appendChild(spanBlocWind);
    blocWind.appendChild(textBlocWind);
    card.appendChild(blocWind);

    blocWeet.classList.add('bloc-weet');
    imgBlocWeet.setAttribute('src','/style/images/weather_map/elements/humidity.png');
    txtBlocWeet.textContent=Math.round(afternoonData[0][1])+'%';
    blocWeet.appendChild(imgBlocWeet);
    blocWeet.appendChild(txtBlocWeet);
    card.appendChild(blocWeet);

    blocRain.classList.add('bloc-rain');
    imgBlocRain.setAttribute('src','/style/images/weather_map/elements/rain.png');
    txtBlocRain.textContent=calculateRiskRain(listWW);
    blocRain.appendChild(imgBlocRain);
    blocRain.appendChild(txtBlocRain);

    card.appendChild(blocRain);
    card.appendChild(blocWeather);
    card.classList.add('weather-card');
    card.classList.add('container-type-1');
    day.textContent = dateDay.toUpperCase();
    day.style.fontFamily = 'Roboto';
    day.style.fontWeight = 'bold';
    card.appendChild(day);
    parentElem.appendChild(card);

}
start();


function calculateRiskRain(listWW) {
    let index = 0;
    let result = 'Faible';
    listWW.forEach(element => {
        if(element > 51) {
            index++;
        }
    });
    switch (index) {
        case 0:
            result = 'Aucun risque';
            break;
        case 1:
            result = 'Faible risque de pluie';
            break;
        case 2:
            result = 'Faible risque de pluie';
            break;
        case 3:
            result = 'Risque de pluie';
            break;
        case 4:
            result = 'Risque important de pluie';
            break;
        case 5:
            result = 'Risque important de pluie';
            break;
        case 6:
            result = 'Risque important de pluie';
            break;
        default:
            result = 'Risque important de pluie';
            break;
    }
    return result;
}