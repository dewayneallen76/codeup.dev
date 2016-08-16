// (function(){
"use strict";
console.log('JS linked');

const myAPIKey = '9045f328001b8cd61b813c19463bd371'; // created constant for API Key 
var weatherObject; 

$.get("http://api.openweathermap.org/data/2.5/weather", {
    APPID: myAPIKey,
    q:     "San Antonio, TX",
    units: "imperial"
}).done(function (data) {
	console.log(data);
	weatherObject = data;
	addWeather(weatherObject);
}).fail(function (xhr, err, msg) {
	alert('Failed to connect!');
});

function addWeather (weatherObject) {
	var content = ''; 
		content += '<h2>' + weatherObject.name + '</h2>';
		content += '<h3>' + 'Current Temp:' + '</h3>';
		content += '<h3>' + weatherObject.main.temp + '</h3>';
		content += '<h4>' + 'High: ' + weatherObject.main.temp_max + '</h4>';
		content += '<h4>' + 'Low: ' + weatherObject.main.temp_min + '</h4>';
		content += weatherObject.weather[0].description;
	$('#container').append(content);
};
console.log(addWeather);




// })();	