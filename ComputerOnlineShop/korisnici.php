<?php include "includes/header.php"; ?>

<style>
	th {
		border: 1px solid grey;
		color:#cccccc;

	}

	td {
		border: 1px solid grey;
		color:#cccccc;
	}
</style>


<!-- <form method="post" action="dodajKorisnika.php">
	<button type="submit" class="btn btn-success" name="dodaj">Dodaj korisnika</button></form> -->

	<h1 style="text-align: center; color: #cccccc;">Korisnici</h1>
		<?php
		if(isset($_GET["brisanje"])){
			$a=$_GET["brisanje"];
			if($a==1){
				echo '<p class="bg-info" style="text-align:center;">Korisnik je obrisan!</p>';
			}else{
				echo '<p class="bg-danger" style="text-align:center;">Korisnik nije obrisan!</p>';
			}
		}
		?>

	<a href="dodajKorisnika.php" class="btn btn-success" role="button" style="margin-bottom: 20px;">Dodaj korisnika</a>


<!-- <table class="table table-hover" style="border: 1px solid grey;"> -->
	<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
  box-shadow: 0 5px 35px rgba(0,0,0,0.2)">
	<thead>
		<tr>
			<th>Id</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>Email</th>
			<th>Korisnicko ime</th>
			<!-- <th>Prezime</th> -->
			<th>Status</th>
			<th colspan="2" style="text-align: center;">Azuriranje</th>
		</tr>
	</thead>



	<?php 
	$result = vratiKorisnike();



	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {



			echo '	<tr><td>'.$row["id"].'</td>
			<td>'.$row["ime"].'</td>
			<td>'.$row["prezime"].'</td>
			<td>'.$row["email"].'</td>
			<td>'.$row["korime"].'</td>
			<td>'.$row["status"].'</td>
			<td><form method="post" action="izmeniKorisnika.php" style="text-align:right;">
			<button type="submit" class="btn btn-info" name="izmeni" value="'.$row["id"].'">Izmeni</button></form></td>
			<td><form method="post" action="izmeniKorisnika.php">
			<button type="submit" class="btn btn-danger" name="obrisi" value="'.$row["id"].'">Obrisi</button></form></td></tr>'; 
		}
	}
	else {
		echo "ne postoji ni jedan korisnik";
	}


	?>
</table>










	<?php include "includes/footer.php"; ?>