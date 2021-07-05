$(document).ready(function(){

	$('.carousel').carousel({
		interval: 2500
}) // tajmer za carousel

	document.getElementById('godina').innerHTML="<a href='index.html'>AutoDelovi</a> &copy "+new Date().getFullYear();

	
});
