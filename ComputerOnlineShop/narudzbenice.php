<?php include "includes/header.php"; ?>


<?php

if(isset($_POST["otkazi"])){
	$id = $_POST["otkazi"];
	
	if(otkaziNarudzbenicu($id)){
		header("location: narudzbenice.php?brisanje=1");
	}else{
		header("location: narudzbenice.php?brisanje=0");
	}
	
}


if(isset($_GET["brisanje"])){
	$a=$_GET["brisanje"];
	if($a==1){
		echo '<p class="bg-info" style="text-align:center;">Vasa porudzbina je otkazana!</p>';
	}else{
		echo '<p class="bg-danger" style="text-align:center;">Poruzbina nije otkazana!</p>';
	}
}


?>


	

<div class="row">
	<h3 style="text-align: center; color:#cccccc;">Narudzbine</h3>

	<?php


	$result = vratiNarudzbenice(); ?>



	<?php

	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {

			 ?>



					<!-- <div class="col-sm-6 col-md-4" >
						<div class="thumbnail" style="background-color: #f6f6f6">
							<?php 

							echo "Korinsik " .$row['korime']. " je porucio " .$row['ukupnoProizvoda'].
							" proizvoda.<br>";
							echo "Adresa - " .$row['ulica']. " " .$row['broj']. " " .$row['grad']. ".<br>";
							echo "Ukupna cena - " .$row['ukupnaCena']. ",00 dinara.<br>";
							echo "Nacin placanja - " .$row['placanje'] . ".<hr>";
							echo '<form method="post" action="proizvod.php" style="margin-bottom: 5px;">
							<button  type="submit" class="btn btn-danger" name="otkazi" value="'.$row["id"].'">Otkazi porudzbinu</button></form>';




							?>
						</div>
					</div> -->


					<div class="cont" style="margin: 3px 70px;">
						<div class="card" style="height: 550px;">
							<div class="box" style="height: 500px;">
								<div class="content" style="padding: 5px; color: white;">
									<?php echo "Korinsik " .$row['korime']. " je porucio " .$row['ukupnoProizvoda'].
									" proizvoda.<br>";
									echo "Adresa - " .$row['ulica']. " " .$row['broj']. " " .$row['grad']. ".<br>";
									echo "Ukupna cena - " .$row['ukupnaCena']. ",00 dinara.<br>";
									echo "Nacin placanja - " .$row['placanje'] . ".<hr>";
									echo '<form method="post" action="naruzbenice.php" style="margin-bottom: 5px;">
									<button  type="submit" class="btn btn-danger" name="otkazi" value="'.$row["id"].'">Otkazi porudzbinu</button></form>';
									?>

								</div>
							</div>
						</div>
					</div>

					<?php

				}
			} 
			else {
				echo " ";
			}




			?>

		</div>










		<?php include "includes/footer.php"; ?>