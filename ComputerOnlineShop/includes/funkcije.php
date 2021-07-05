<?php session_start(); ?>


<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">

<?php

$odg = "";

function konekcija(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "compshop";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function korisnickoImeNijeZauzeto($korime){
	$greska3 = '<p class="bg-danger" style="text-align:center;">Korisnicko ime zauzeto!</p>';
	$conn = konekcija();

	$sql = "SELECT * FROM korisnici WHERE korime='".$korime."'";
	$result = $conn->query($sql);

	$conn->close();

	if($result->num_rows>0){
		return $greska3;
	}else{
		return 1;
	}

}

function registracija($ime,$prezime,$email,$korime,$lozinka,$potvrda,$status){
	$greska1 = '<p class="bg-danger" style="text-align:center;">Morate popuniti sva polja!</p>';
	$greska2 = '<p class="bg-danger" style="text-align:center;">Lozinka i potvrda se ne slazu!</p>';

	//da li su svi podaci uneti
	if(strlen($ime)==0 || strlen($prezime)==0 || strlen($email)==0 || strlen($korime)==0 || strlen($lozinka)==0 || strlen($potvrda)==0){
		return $greska1;
	}

	if($lozinka!=$potvrda){
		return $greska2;
	}

	$odg = korisnickoImeNijeZauzeto($korime);
	if($odg!=1){
		return $odg;
	}

	$conn = konekcija();
	$sql = "INSERT INTO korisnici VALUES(null,'".$ime."','".$prezime."','".$email."','".$korime."','".password_hash($lozinka, PASSWORD_DEFAULT)."','".$status."')";
	if ($conn->query($sql) === TRUE) {
		$conn->close();
		return 1;
	} else {
		$conn->close();
		return  "Error: " . $sql . "<br>" . $conn->error;
	}

	return 1;
}

function logovanje($korime,$lozinka){
	$greska1 = '<p class="bg-danger" style="text-align:center;">Korisnicko ime ne postoji!</p>';
	$greska2 = '<p class="bg-danger" style="text-align:center;">Pogresna sifra!</p>';
	$greska3 = '<p class="bg-danger" style="text-align:center;">Morate popuniti sva polja!</p>';

	if(strlen($korime)==0 || strlen($lozinka)==0){
		return $greska3;
	}

	$conn = konekcija();

	$sql = "SELECT * FROM korisnici WHERE korime='".$korime."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
		$row = $result->fetch_assoc();
		$hesovana_lozinka = $row["sifra"];
	} else {
		return $greska1;
	}

	$conn->close();

	if(password_verify($lozinka, $hesovana_lozinka)==1){
		//pravimo sesije
		$_SESSION["status"] = $row["status"];
		$_SESSION["podaci"] = $row;
		$_SESSION['is_loggedin'] = true;
		// $_SESSION["user"]["item i++"]


		return 1;
	}else{
		return $greska2;
	}
	/*
	$b=password_hash("aaaa", PASSWORD_DEFAULT);

	echo $b."<br>";
	echo password_verify("aaasdaa", $b);
	*/
	//echo password_hash("aaaa", PASSWORD_DEFAULT)."<br>";
	//echo password_hash("aaaa", PASSWORD_DEFAULT);
}

function vratiKorisnike(){
	$conn = konekcija();

	$sql = "SELECT * FROM korisnici";
	$result = $conn->query($sql);

	$conn->close();
	return $result;
}

function vratiKorisnika($id){
	$conn = konekcija();

	$sql = "SELECT * FROM korisnici WHERE id=".$id;
	$result = $conn->query($sql);

	$conn->close();
	$row = $result->fetch_assoc();
	return $row;

}

function izmeni($id,$ime,$prezime,$korime,$email){
	$conn = konekcija();

	$sql = "UPDATE korisnici SET ime='".$ime."',prezime='".$prezime."',korime='".$korime."',email='".$email."' WHERE id=".$id;

	$conn->query($sql);

	$conn->close();
}

function obrisi($id){
	$conn=konekcija();

	$sql = "DELETE  FROM korisnici WHERE id='" .$id. "'";

	$a=$conn->query($sql);

	$conn->close();

	return $a;
}

function vratiProizvode(){
	$conn = konekcija();

	$sql = "SELECT * FROM proizvodi";
	$result = $conn->query($sql);

	$conn->close();

	return $result; 
}

function vratiProizvod($id){
	$conn = konekcija();

	$sql = "SELECT * FROM proizvodi WHERE id=".$id;
	$result = $conn->query($sql);

	$conn->close();
	$row = $result->fetch_assoc();
	return $row;

}

function proizvodVecPostoji($marka){
	$greska2 = '<p class="bg-danger" style="text-align:center;">Proizvod vec postoji u bazi!</p>';

	$conn = konekcija();
	$sql = "SELECT * FROM proizvodi WHERE marka = '".$marka."'";

	$result = $conn->query($sql);

	$conn->close();

	if($result->num_rows>0){
		return $greska2;
	}else{
		return 1;
	}
}

function dodajProizvod($tip,$marka,$cena,$slika1){
	$greska1 = '<p class="bg-danger" style="text-align:center;">Morate popuniti sva polja!</p>';

	if (strlen($tip)==0 || strlen($marka)==0 || strlen($cena)==0 ||  strlen($slika1)==0) {
		return $greska1;
	}

	$odg = proizvodVecPostoji($marka);

	if($odg != 1){
		return $odg;
	}

	$conn=konekcija();
	$sql = "INSERT INTO proizvodi VALUES (null,'" .$tip. "','" .$marka. "','" .$cena. "','" .$slika1. "')";

	if($conn->query($sql) === TRUE){
		$conn->close();
		return 1;
	}
	else {
		$conn->close();
		return "Greska: " .$sql. "<br>" .$conn->error;
	}

	return 1;
}

function izmeniProizvod($id,$marka,$cena,$slika1){

	$odg = proizvodVecPostoji($marka);

	if($odg != 1){
		return $odg;
	}

	$conn = konekcija();

	$sql = "UPDATE proizvodi SET marka='".$marka."',cena='".$cena."',slika1='".$slika1."' WHERE id=".$id;

	$conn->query($sql);

	$conn->close();
}

function obrisiProizvod($id){
	$conn=konekcija();

	$sql = "DELETE  FROM proizvodi WHERE id='" .$id. "'";

	$a=$conn->query($sql);

	$conn->close();

	return $a;
}

function proizvodVecUKorpi($korime, $proizvod){
	$greska = '<p class="bg-danger" style="text-align:center;">Proizvod vec postoji u korpi!</p>';

	$conn = konekcija();

	$sql = "SELECT * FROM korpa WHERE korime='" .$korime. "' AND proizvod='" .$proizvod. "'";

	$result = $conn->query($sql);

	$conn->close();

	if ($result->num_rows>0) {
		return $greska;
	}
	else {
		return 1;
	}
}

function dodajUKorpu($korime,$proizvod,$kolicina,$slika,$cena,$ukupnaCena){
	$odg = proizvodVecUKorpi($korime, $proizvod);

	if ($odg != 1) {
		return $odg;
	}

	$conn = konekcija();

	$sql = "INSERT INTO korpa VALUES (null,'" .$korime. "','" .$proizvod. "','" .$slika. "','" .$cena. "','" .$kolicina. "','" .$ukupnaCena. "')";

	if ($conn->query($sql)===TRUE) {
		$conn->close();
		return 1;
	}else{
		$conn->close();
		return "Greska: " . $sql . "<br>" . $conn->error;
	}

	return 1;
}

function vratiKorpu(){
	$conn = konekcija();

	$sql = "SELECT * FROM korpa";

	$result = $conn->query($sql);

	$conn->close();

	return $result;
}

function obrisiIzKorpe($id){
	$conn=konekcija();

	$sql = "DELETE  FROM korpa WHERE id='" .$id. "'";

	$a=$conn->query($sql);

	$conn->close();

	return $a;
}

function vratiKorpu1(){
	$conn = konekcija();

	$sql = "SELECT * FROM korpa";

	$result1 = $conn->query($sql);

	$conn->close();

	return $result1;
}

function ukupnoProizvoda($korime){
	$ukupnoProizvoda = 0;

	$conn = konekcija();

	$sql = "SELECT count(id) as ukupnoProizvoda FROM korpa WHERE korime='".$korime."'";

	$result = $conn->query($sql);

	$conn->close();

	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {


			$ukupnoProizvoda = $row['ukupnoProizvoda'];







			
		} 
	}
	else {
		echo "ne postoji ni jedan korisnik";
	}

	return $ukupnoProizvoda;


}

function ukupnaCena($korime){
	$ukupnaCena = 0;

	$conn = konekcija();

	$sql = "SELECT SUM(ukupnaCena) as total FROM korpa WHERE korime='".$korime."'";

	$result = $conn->query($sql);

	$conn->close();

	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {


			$ukupnaCena = $row['total'];
			
		} 
	}
	else {
		echo "ne postoji ni jedan korisnik";
	}

	return $ukupnaCena;
}

function kreirajNarudzbenicu($korime,$broj,$ulica,$grad,$ukupnoProizvoda,$cenaTotal,$placanje){
	
	$greska1 = '<p class="bg-danger" style="text-align:center;">Morate popuniti sva polja!</p>';

	if (strlen($broj)==0 || strlen($ulica)==0 || strlen($grad)==0) {
		return $greska1;
	}

	$conn = konekcija();

	$sql = "INSERT INTO narudzbenice VALUES (null,'" .$korime. "','" .$broj. "','" .$ulica. "','" .$grad. "','" .$ukupnoProizvoda. "','" .$cenaTotal. "','" .$placanje. "')";

	if ($conn->query($sql)===TRUE) {
		$conn->close();
		return 1;
	}else{
		$conn->close();
		return "Greska: " . $sql . "<br>" . $conn->error;
	}

	return 1;
}

function isprazniKorpu($korime){
	$conn=konekcija();

	$sql = "DELETE  FROM korpa WHERE korime='" .$korime. "'";

	$b=$conn->query($sql);

	$conn->close();

	return $b;
}

function vratiNarudzbenice(){
	$conn = konekcija();

	$sql = "SELECT * FROM narudzbenice";
	$result = $conn->query($sql);

	$conn->close();

	return $result; 
}

function otkaziNarudzbenicu($id){
	$conn=konekcija();

	$sql = "DELETE  FROM narudzbenice WHERE id='" .$id. "'";

	$a=$conn->query($sql);

	$conn->close();

	return $a;
}

function posaljiMail($email,$subject,$text){
	$greska1 = '<p class="bg-danger" style="text-align:center;">Morate popuniti sva polja!</p>';

	if (strlen($email)==0 || strlen($subject)==0 || strlen($text)==0) {
		return $greska1;
	}

	$conn = konekcija();

	$sql = "INSERT INTO email VALUES (null,'" .$email. "','" .$subject. "','" .$text. "')";

	if ($conn->query($sql)===TRUE) {
		$conn->close();
		return 1;
	}else{
		$conn->close();
		return "Greska: " . $sql . "<br>" . $conn->error;
	}

	return 1;

}

function vratiMailove(){
	$conn = konekcija();

	$sql = "SELECT * FROM email";
	$result = $conn->query($sql);

	$conn->close();

	return $result; 
}

function vratiMail($id){
	$conn = konekcija();

	$sql = "SELECT * FROM email WHERE id=".$id;
	$result = $conn->query($sql);

	$conn->close();
	$row = $result->fetch_assoc();
	return $row;

}


?>