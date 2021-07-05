<?php include "includes/header.php"; ?>

<style>
	th {
		
		color:#cccccc;

	}

	td {
		
		color:#cccccc;
	}
</style>



<h1 style="text-align: center; color:#cccccc;">Proizvodi</h1>
<?php
if(isset($_GET["brisanje"])){
	$a=$_GET["brisanje"];
	if($a==1){
		echo '<p class="bg-info" style="text-align:center;">Proizvod je obrisan!</p>';
	}else{
		echo '<p class="bg-danger" style="text-align:center;">Proizvod nije obrisan!</p>';
	}
}
?>


<a href="dodajProizvod.php" class="btn btn-success" role="button" style="margin-bottom: 20px;">Dodaj proizvod</a>


<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
	box-shadow: 0 5px 35px rgba(0,0,0,0.2)">
	<thead>
		<tr>
			<th>Id</th>
			<th>Slika</th>
			<th>Naziv</th>
			<th>Tip</th>
			<th>Cena</th>
			<!-- <th>Prezime</th> -->
			
			<th colspan="2" style="text-align: center;">Azuriranje</th>
		</tr>
	</thead>



	<?php 
	$result = vratiProizvode();



	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {



			echo '	<tr><td>'.$row["id"].'</td>
			<td><img width="100px" height="100px" src="'.$row["slika"].'"></td> 
			<td>'.$row["marka"].'</td>
			<td>'.$row["tip"].'</td>
			<td>'.$row["cena"].',00 RSD</td>
			
			
			<td><form method="post" action="izmeniProizvod.php" style="text-align:right;">
			<button type="submit" class="btn btn-info" name="izmeniPr" value="'.$row["id"].'">Izmeni</button></form></td>
			<td><form method="post" action="izmeniProizvod.php">
			<button type="submit" class="btn btn-danger" name="obrisiPr" value="'.$row["id"].'">Obrisi</button></form></td></tr>'; 
		}
	}
	else {
		echo "ne postoji ni jedan korisnik";
	}


	?>
</table>




<?php include "includes/footer.php"; ?>