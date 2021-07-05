<?php include 'includes/header.php'; ?>


<?php

if (isset($_POST["register"])) {
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
	$korime = $_POST["username"];
	$lozinka = $_POST["pwd"];
	$potvrda = $_POST["pwd2"];
	$status = "korisnik";

	$odg = registracija($ime,$prezime,$email,$korime,$lozinka,$potvrda,$status);
	if ($odg == 1) {
		$odg = '<p class="bg-info" style="text-align:center;">Uspesna registracija!</p>';
	}

		
}






?> 



<div class="row" style="width: 400px; height: 670px; margin: auto; background-color: #e6eaf0; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Registracija</h1>
	<?php echo $odg ?>  
	<form method="post" action="registracija.php">
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
			<input type="password" name="pwd2" placeholder="Potvrdite sifru">
		</div>
		<input type="submit" name="register" value="Registrujte se"><br><br>
		<div class="link">
			<p>Imate nalog? <a href="login.php">Prijavite se</a></p>
		</div><br>
	</form>
</div>

<?php include 'includes/footer.php' ?>