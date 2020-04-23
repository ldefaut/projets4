


var page = document.querySelector(".page");

if (page!=null) {
	var Hinit = page.offsetHeight;
	var haut = window.innerHeight;
	var idPage = page.id;


	if (Hinit< haut) {

		$(document).ready(function(){
			if (idPage!="arriere") {
				$(".page").closest("body").css("overflow", "hidden");
			}
			page.style.height = haut + "px";
			console.log(haut);
		})
	}
}


var id = document.querySelector("section");
if (id!=null) {
	id = id.id;
	console.log(id);
	if (id=="noGame") {
		var nav = document.querySelector("nav");
		nav.classList.add("admin");
	}
}



var img = document.querySelector("img.medecin");
if (img!=null){
	img.classList.add("full");
}


console.log(id);
if (id=="rep") {
	var result = parseInt(document.getElementById("result").innerHTML);
	var numero = parseInt(document.getElementById("numero").innerHTML);
	$("#rep .bandeau span:nth-child(-n+"+numero+")").css({"background-color": '#30336b', "border": "0"});
	$("#rep .bandeau span:nth-child(-n+"+result+")").css({"background-color": '#f9ca24', "border": "0"});
}
