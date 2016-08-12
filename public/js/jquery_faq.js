(function(){
"use strict";
console.log('js linked');
$(document).ready(function() {
    $('#show-information').click(function(event) {
        event.preventDefault();
        $('dd').toggleClass('invisible');
    });
});

})();