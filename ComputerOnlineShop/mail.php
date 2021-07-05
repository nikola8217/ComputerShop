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

	<h3 style="text-align: center; color: #cccccc;">Mailovi</h3>
		


<!-- <table class="table table-hover" style="border: 1px solid grey;"> -->
	<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
  box-shadow: 0 5px 35px rgba(0,0,0,0.2)">
	<thead>
		<tr>
			<th>Email</th>
			<th>Subject</th>
			
			<th>Text</th>
		</tr>
	</thead>



	<?php 
	$result = vratiMailove();



	if ($result->num_rows > 0) {
          // output data of each row
		while($row = $result->fetch_assoc()) {



			echo '	<tr><td>'.$row["email"].'</td>
			<td>'.$row["subject"].'</td>
			
			<td>'.$row["text"].'</td>'; 
		}
	}
	else {
		echo "ne postoji ni jedan e-mail";
	}


	?>
</table>










	<?php include "includes/footer.php"; ?>