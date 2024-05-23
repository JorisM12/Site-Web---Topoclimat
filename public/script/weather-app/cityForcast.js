const parentElem = document.querySelector('#forcast-city section');
const beforeNodeCard = document.querySelector('#forcast-city');


function startCard(start ='2024-03-03',numDay = 'J1',lat ='48.06', lon = '6.88') {
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
        createWeatherCard(arrayDataPeriod,numDay);
    })
    .catch(error => {
        console.error('Erreur dans la lecture des données:', error);
    });

    function stmtPeriod(date ='2024-02-29T00:00') {
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
}



startCard(getNextDays(0));
startCard(getNextDays(1),'J2');
startCard(getNextDays(2),'J3');
startCard(getNextDays(3),'J4');
startCard(getNextDays(4),'J5');
startCard(getNextDays(5),'J6');

function getNextDays(numDays) {
    let currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + numDays);
    let year = currentDate.getFullYear();
    let month = String(currentDate.getMonth() + 1).padStart(2, '0');
    let day = String(currentDate.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}


function createWeatherCard(data = 0,numDay) {

    // Extraction des données du matin
    let morningData = [];
    for (let time in data.morning) {
    morningData.push(data.morning[time]);
    }

    // Extraction des données de l'après-midi
    let afternoonData = [];
    for (let time in data.afternoon) {
    afternoonData.push(data.afternoon[time]);
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
    imgBlocWind.setAttribute('src','/style/images/weather_map/buttons/wind.svg');
    textBlocWind.textContent=Math.round(afternoonData[0][3])+'km/h ';
    spanBlocWind.textContent = '('+Math.round(afternoonData[0][4])+')';
    blocWind.appendChild(imgBlocWind);
    textBlocWind.appendChild(spanBlocWind);
    blocWind.appendChild(textBlocWind);
    card.appendChild(blocWind);

    blocWeet.classList.add('bloc-weet');
    imgBlocWeet.setAttribute('src','/style/images/weather_map/elements/humidity.svg');
    txtBlocWeet.textContent=Math.round(afternoonData[0][1])+'%';
    blocWeet.appendChild(imgBlocWeet);
    blocWeet.appendChild(txtBlocWeet);
    card.appendChild(blocWeet);

    blocRain.classList.add('bloc-rain');
    imgBlocRain.setAttribute('src','/style/images/weather_map/elements/rain.svg');
    txtBlocRain.textContent='faible';
    blocRain.appendChild(imgBlocRain);
    blocRain.appendChild(txtBlocRain);
    card.appendChild(blocRain);

    card.appendChild(blocWeather);
    card.classList.add('weather-card');
    card.classList.add('container-type-1');
    day.textContent = todayDate(numDay,true).toUpperCase();
    day.style.fontFamily = 'Roboto';
    day.style.fontWeight = 'bold';
    card.appendChild(day);
    parentElem.appendChild(card);

}




