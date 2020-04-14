


var page = document.querySelector(".page");
var Hinit = page.offsetHeight;

var haut = window.innerHeight;

if (Hinit< haut) {

	$(document).ready(function(){
		$(".page").closest("body").css("overflow", "hidden");
		page.style.height = haut + "px";
		console.log(haut);
	})
}
