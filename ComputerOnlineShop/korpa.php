<?php include "includes/header.php"; 

function totalPr(){
	$korime = $_SESSION['podaci']['korime'];
	echo ukupnoProizvoda($korime);
}

function totalCena(){
	$korime = $_SESSION['podaci']['korime'];
	echo ukupnaCena($korime);
}

if (isset($_POST['kupi'])) {
	$korime = $_SESSION['podaci']['korime'];
	$broj = $_POST['broj'];
	$ulica = $_POST['ulica'];
	$grad = $_POST['grad'];
	$ukupnoProizvoda = ukupnoProizvoda($korime);
	$cenaTotal = ukupnaCena($korime);
	$placanje = $_POST['placanje'];

	$odg = kreirajNarudzbenicu($korime,$broj,$ulica,$grad,$ukupnoProizvoda,$cenaTotal,$placanje);
	$b = isprazniKorpu($korime);

	if ($odg == 1) {
		$odg = '<p class="bg-info" style="text-align:center;">Izvrsili ste kupovinu!</p>';
	}

	echo $b;
}


?>




<h1 style="text-align: center; color:#cccccc;">Vasa korpa</h1>
<?php
echo $odg;
if(isset($_POST["obrisiIzKorpe"])){
	$id = $_POST["obrisiIzKorpe"];
	
	if(obrisiIzKorpe($id)){
		header("location: korpa.php?brisanje=1");
	}else{
		header("location: korpa.php?brisanje=0");
	}
	
}


if(isset($_GET["brisanje"])){
	$a=$_GET["brisanje"];
	if($a==1){
		echo '<p class="bg-info" style="text-align:center;">Proizvod je obrisan iz korpe!</p>';
	}else{
		echo '<p class="bg-danger" style="text-align:center;">Proizvod nije obrisan!</p>';
	}
}
?>





<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
	box-shadow: 0 5px 35px rgba(0,0,0,0.2)">
	<thead>
		<tr>
			<th>*</th>
			<th>Proizvod</th>
			<th>Cena</th>
			<th>Kolicina</th>
			<th>Ukupno</th>
			<!-- <th>Prezime</th> -->
			<!-- <th>Opis</th> -->
			<th style="text-align: center;">*</th>
		</tr>
	</thead>



	<?php 
	$result = vratiKorpu();



	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {

			if ($row['korime']==$_SESSION['podaci']['korime']) {
				




				echo '	<tr><td><img width="100px" height="100px" src="'.$row["slika"].'"></td>

				<td>'.$row["proizvod"].'</td>
				<td>'.$row["cena"].',00 RSD</td>
				<td>'.$row["kolicina"].'</td>
				<td>'.$row["ukupnaCena"].',00 RSD</td>

				<td><form method="post" action="korpa.php">
				<button type="submit" class="btn btn-danger" name="obrisiIzKorpe" value="'.$row["id"].'">Obrisi</button></form></td></tr>'; 
			}
		} }
		else {
			echo " ";
		}



		?>

		<!-- <tr>
			<td style="width: 25%;"></td>
			<td style="width: 50%;"></td>
			<td style="width: 25%;"></td>
		</tr> -->

	</table>

	<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
	box-shadow: 0 5px 35px rgba(0,0,0,0.2)">

		<tr>
			<td><b>Datum: </b><?php echo date("d-m-Y"); ?></td>
		</tr>
		<tr>
			<td><b>Ukupno proizvoda: </b><?php 
			totalPr();
			?></td>
		</tr>
		<tr>
			<td><b>Ukupna cena: </b><?php 
			totalCena();
			?>,00 RSD</td>
		</tr>
		<tr><td>
			<form method="post" action="korpa.php">
				<input type="text" name="broj" placeholder="Unesite broj">
				<input type="text" name="ulica" placeholder="Unesite ulicu">
				<input type="text" name="grad" placeholder="Unesite grad"><br><br>
				<input type="radio" name="placanje" value="Online placanje"> Online placanje<br>
				<input type="radio" name="placanje" value="Prilikom dostave"> Placanje prilikom dostave<br><br>
				
				<button style="margin-left: 440px; width: 250px;" type="submit" class="btn btn-success" name="kupi">Izvrsi kupovinu</button>
			</form>
		</td></tr>
	</table>








	<?php include "includes/footer.php"; ?>