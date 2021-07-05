<?php include "includes/header.php"; ?>


<?php
if (isset($_POST['dodajPr'])) {
	// echo "registracija";
	$tip = $_POST["tip"];
	$marka = $_POST["marka"];
	$cena = $_POST["cena"];
	
	$slika1 = $_POST["slika1"];
	

	$odg = dodajProizvod($tip,$marka,$cena,$slika1);
	if($odg==1){
		$odg='<p class="bg-info" style="text-align:center;">Proizvod je dodat u bazu!</p>';
	}


}

?>

<div class="row" style="width: 400px; height: 500px; margin: auto; background-color: #f6f6f6; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Dodaj proizvod</h1>
	<?php echo $odg ?> 
	<form method="post" action="dodajProizvod.php">
		<div class="txt_field">
			<select name="tip">
				<option value="desktop">Desktop</option>
				<option value="laptop">Laptop</option>
				<option value="oprema">Oprema</option>
			</select>
		</div>
		<div class="txt_field">
			<input type="text" name="marka" placeholder="Unesite naziv proizvoda">
		</div>
		<div class="txt_field">
			<input type="text" name="cena" placeholder="Unesite cenu">
		</div>
		
		<div class="txt_field">
			<input type="text" name="slika1" placeholder="Unesite sliku">
		</div>
		
		<input type="submit" name="dodajPr" value="Dodaj proizvod"><br><br>
		<div class="link">
			Vrati se <a href="shop.php"> nazad</a>
		</div><br>
	</form>
</div>

<?php include "includes/footer.php"; ?>