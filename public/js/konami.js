(function(){
"use strict";
console.log('JS linked');

var konamiCode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
var input = [];

$(document).keyup(function(event) {
    input.push(event.keyCode);
      if (input.length > konamiCode.length) {
        input.shift();
      }
      if (input.toString() == konamiCode.toString()) {
        alert('You get 30 Extra Lives');
        $('h1').css('color', 'orange');
        $('body').css('background', 'green');
        $('body').css('background-image', 'url(/img/contra.gif)');
       }
	});


})();