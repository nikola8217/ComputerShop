<?php include "includes/header.php"; ?>


<?php
if (isset($_POST['dodaj'])) {
	echo "registracija";
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
	$korime = $_POST["username"];
	$lozinka = $_POST["pwd"];
	$status = $_POST["status"];

	$odg = registracija($ime,$prezime,$email,$korime,$lozinka,$lozinka,$status);
	if($odg==1){
		$odg='<p class="bg-info" style="text-align:center;">Korisnik je dodat u bazu!</p>';
	}


}

?>

<div class="row" style="width: 400px; height: 650px; margin: auto; background-color: #f6f6f6; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Dodaj korisnika</h1>
	<?php echo $odg ?> 
	<form method="post" action="dodajKorisnika.php">
		<div class="txt_field">
			<input type="text" name="ime" placeholder="Unesite vase ime">
		</div>
		<div class="txt_field">
			<input type="text" name="prezime" placeholder="Unesite vase prezime">
		</div>
		<div class="txt_field">
			<input type="email" name="email" placeholder="Unesite vas email">
		</div>
		<div class="txt_field">
			<input type="text" name="username" placeholder="Unesite korisnicko ime">
		</div>
		<div class="txt_field">
			<input type="password" name="pwd" placeholder="Unesite sifru">
		</div>
		<div class="txt_field">
			<select name="status">
				<option value="admin">Admin</option>
				<option value="korisnik">Korisnik</option>
				<option value="menadzer">Menadzer</option>
			</select>
		</div>
		<input type="submit" name="dodaj" value="Registrujte se"><br><br>
		<div class="link">
			Vrati se <a href="korisnici.php"> nazad</a>
		</div><br>
	</form>
</div>


<?php include "includes/footer.php"; ?>