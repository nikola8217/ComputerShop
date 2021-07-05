<?php include 'includes/header.php'; ?>



<?php 

if(isset($_POST["izmeniPr"])){
	$id = $_POST["izmeniPr"];
	$row=vratiProizvod($id);
}

if(isset($_POST["update-pr"])){
	$id = $_POST["id"];
	$marka = $_POST["marka"];
	$cena = $_POST["cena"];
	
	$slika1 = $_POST["slika1"];
	

	izmeniProizvod($id,$marka,$cena,$slika1);

	header("location: shop.php");
}

if(isset($_POST["obrisiPr"])){
	$id = $_POST["obrisiPr"];
	
	if(obrisiProizvod($id)){
		header("location: shop.php?brisanje=1");
	}else{
		header("location: shop.php?brisanje=0");
	}
	
}


?>


<div class="row" style="width: 400px; height: 720px; margin: auto; background-color: #f6f6f6; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Izmeni proizvod</h1>
	
	<form method="post" action="izmeniProizvod.php">
		<div class="txt_field">
			<input type="hidden" name="id" value="<?php echo $id ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="id" disabled value="<?php echo $id ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="tip" disabled value="<?php echo $row['tip'] ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="marka" value="<?php echo $row['marka'] ?>">
		</div>
		<div class="txt_field">
			<input type="text" name="cena" value="<?php echo $row['cena'] ?>">
		</div>
		
		<div class="txt_field">
			<input type="text" name="slika1" value="<?php echo $row['slika'] ?>">
		</div>
		
		
		<input type="submit" name="update-pr" value="Azuriraj"><br><br>
		
	</form>
</div>




<?php include 'includes/footer.php'; ?>