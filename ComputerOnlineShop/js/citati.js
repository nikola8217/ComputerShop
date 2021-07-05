function citati(){
	quotes = []; 
	authors = []; 

	quotes[0] = "Zdrav covek ima hiljadu zelja, a bolestan samo jednu - da ozdravi";
	authors[0] = "Narodna izreka"
	quotes[1] = "Nema sunca bez svetlosti, ni coveka bez ljubavi";
	authors[1] = "Gete"
	quotes[2] = "Cast se ne moze oduzeti, ona se moze samo izgubiti";
	authors[2] = "Cehov"
	quotes[3] = "Toliko je bilo stvari u zivotu kojih smo se bojali. A nije trebalo. Trebalo je ziveti";
	authors[3] = "Ivo Andric"

	index = Math.floor(Math.random() * quotes.length);
	document.getElementById("citat").innerHTML = quotes[index];
	document.getElementById("author").innerHTML = authors[index];
	
}