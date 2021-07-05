<?php include 'includes/header.php'; ?>



<?php 

if(isset($_POST["izmeni"])){
	$id = $_POST["izmeni"];
	$row=vratiKorisnika($id);
}

if(isset($_POST["update-kor"])){
	$id = $_POST["id"];
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
	$korime = $_POST["korime"];

	izmeni($id,$ime,$prezime,$korime,$email);

	header("location: korisnici.php");
}

if(isset($_POST["obrisi"])){
	$id = $_POST["obrisi"];
	
	if(obrisi($id)){
		header("location: korisnici.php?brisanje=1");
	}else{
		header("location: korisnici.php?brisanje=0");
	}
	
}


?>


<div class="row" style="width: 400px; height: 650px; margin: auto; background-color: #f6f6f6; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Registracija</h1>
	
	<form method="post" action="izmeniKorisnika.php">
		<div class="txt_field">
			<input type="hidden" name="id" value="<?php echo $id ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="prezime" disabled value="<?php echo $id ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="ime" value="<?php echo $row['ime'] ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="prezime" value="<?php echo $row['prezime'] ?>">
		</div>
		<div class="txt_field">
			<input type="email" name="email" value="<?php echo $row['email'] ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="korime" value="<?php echo $row['korime'] ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="status" disabled value="<?php echo $row['status'] ?>">
		</div>
		<input type="submit" name="update-kor" value="Azuriraj"><br><br>
		
	</form>
</div>




<?php include 'includes/footer.php'; ?>