(function(){

"use strict";

console.log('js linked');
$(document).ready(function() {
    $('#show-information').click(function(event) {
        event.preventDefault();
        $('dd').toggleClass('invisible');
    });

$('ul').each(function(element, index) {
	$(this).children('li').first().css('font-weight', 'bold');
	});

$('li').click(function(event) {
        event.preventDefault();
        $(this).parent().toggleClass('invisible');
    });
 
});

})(); 