(function(){
"use strict";
console.log('javascript linked');

var equals = document.getElementById('btnEquals');
var clear = document.getElementById('btnClear');
var numbers = document.getElementsByClassName('numbers');
var leftInput = document.getElementById('leftInput');
var operator = document.getElementById('operatorInput');
var rightInput = document.getElementById('rightInput');
var operators = document.getElementsByClassName('operators');
var answer = 0
// for (var i = 0; i < operators.length; i++) {
// 	operators[i].addEventListener('click', handleButton)
// }

for (var i = 0; i < numbers.length; i++) {
	numbers[i].addEventListener('click',handleButton)
}
for (var i = 0; i < operators.length; i++) {
	operators[i].addEventListener('click',handleButton)
}

// Now I need to get the handleButton function to display in the inputs on top of the calculator
function handleButton(){
	console.log(this.className);
	if (this.className.includes("operators")) {
		operator.value = this.innerHTML;
	} else if (operator.value != ''){
		rightInput.value += this.innerHTML;
	} else if (this.className.includes("numbers")) {
		leftInput.value += this.innerHTML;
	}
////FERNANDO HELPED ME WITH THE CODE BELOW//////////////
	// if (operator.value != '' && this.className.includes("keys")){
	// 	rightInput.value += this.innerHTML;
	// } else if (operator.value == '' && this.className.includes("keys")) {
	// 	leftInput.value += this.innerHTML;
	// } else if (this.className.includes("operators") && operator.value == '') {
	// 	operator.value = this.innerHTML;
	// } 
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
// Equals
equals.addEventListener('click',function(){

	console.log(leftInput.value);
})






})();			