// (function(){
"use strict";
console.log('JS linked');

const myAPIKey = '9045f328001b8cd61b813c19463bd371'; // created constant for API Key 
var weatherObject; 

$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
    APPID: myAPIKey,
    q:     "San Antonio, TX",
    units: "imperial"
}).done(function (data) {
	weatherObject = data;
	console.log(weatherObject);
	addWeather(weatherObject);
	tomorrowWeather(weatherObject);
	thirdDayWeather(weatherObject);
}).fail(function (xhr, err, msg) {
	alert('Failed to connect!');
});
// console.log(weatherObject);
function addWeather (weatherObject) {
	var content = ''; 
		content += '<h3>' + parseInt(weatherObject.list[0].temp.day) + '&deg' + '/' + parseInt(weatherObject.list[0].temp.min) + '&deg' + '</h3>';
		content += '<img src = "http://openweathermap.org/img/w/'+ weatherObject.list[0].weather[0].icon +'.png">';
		content += '<h4>' + 'Humidity: ' + weatherObject.list[0].humidity + '</h4>';
		content += '<h4>' + 'Pressure: ' + weatherObject.list[0].pressure + '</h4>';
		content += weatherObject.list[0].weather[0].description;
	$('#todayWeather').append(content);
};

function tomorrowWeather (weatherObject) {
	var content = '';
		content += '<h3>' + parseInt(weatherObject.list[1].temp.day) + '&deg' + '/' + parseInt(weatherObject.list[1].temp.min) + '&deg' + '</h3>';
		content += '<img src = "http://openweathermap.org/img/w/'+ weatherObject.list[1].weather[0].icon +'.png">';
		content += '<h4>' + 'Humidity: ' + weatherObject.list[1].humidity + '</h4>';
		content += '<h4>' + 'Pressure: ' + weatherObject.list[1].pressure + '</h4>';
		content += weatherObject.list[1].weather[0].description;
	$('#tomorrowWeather').append(content);
};

function thirdDayWeather (weatherObject) {
	var content = '';
		content += '<h3>' + parseInt(weatherObject.list[2].temp.day) + '&deg' + '/' + parseInt(weatherObject.list[2].temp.min) + '&deg' + '</h3>';
		content += '<img src = "http://openweathermap.org/img/w/'+ weatherObject.list[2].weather[0].icon +'.png">';
		content += '<h4>' + 'Humidity: ' + weatherObject.list[2].humidity + '</h4>';
		content += '<h4>' + 'Pressure: ' + weatherObject.list[2].pressure + '</h4>';
		content += weatherObject.list[2].weather[0].description;
	$('#thirdDayWeather').append(content);
};

var mapOptions = {
          zoom: 4,
          center: {
              lat:  37.0902,
              lng:  -95.7129
          }
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);


// })();	