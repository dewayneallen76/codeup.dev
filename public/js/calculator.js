(function(){
"use strict";
console.log('javascript linked');

var equals = document.getElementsByClassName('equals');
var clear = document.getElementById('btnClear');
var buttons = document.getElementsByClassName('buttons');
var leftInput = document.getElementById('leftInput');
var operator = document.getElementById('operator');
var rightInput = document.getElementById('rightInput');
var operators = document.getElementsByClassName('operators');

for (var i = 0; i < operators.length; i++) {
	operators[i].addEventListener('click', handleButton)
}

for (var i = 0; i < buttons.length; i++) {
	buttons[i].addEventListener('click',handleButton)

}

// Now I need to get the handleButton function to display in the inputs on top of the calculator
function handleButton(){
	leftInput.value += this.innerHTML;
	// operator.value = operator.innerHTML;
	// rightInput.value += rightInput.innerHTML;
	// console.log(leftInput.value);

}
// Clear 
clear.addEventListener('click',function(){
	leftInput.value = '';
	rightInput.value = '';
	operator.value = '';
})






})();			