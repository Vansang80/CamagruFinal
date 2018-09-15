var elements = document.querySelectorAll(".camera_js");
var elementsLenght = elements.length;
var filtre_camara = document.getElementById("filter_img");
var startbutton = document.getElementById("startbutton");


for (var i = 0; i < elementsLenght; i++)
{
	elements[i].addEventListener("click", function(e){

	filtre_camara.style.display = "block";
	startbutton.style.display= "block";
	/*filtre_camara.src = "../webroot/" + getComputedStyle(elements[e.target.id]).backgroundImage.slice(46, 69);*/
	filtre_camara.src = "../webroot/img/camera_filter/" + e.path[0].id + ".png";
	document.getElementById('hidden_data1').value = e.target.id;
	});
}


