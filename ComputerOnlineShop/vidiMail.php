<?php include "includes/header.php"; ?>


<div class="row">
	
	<?php


	if(isset($_POST["prikazi"])){
		$id = $_POST["prikazi"];
		$row=vratiMail($id);

		while($row = $result->fetch_assoc()) {

	?>



	<div class="col-md-12" style="margin-bottom: 30px;">
					<table class="table" style="background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 20px; 
					box-shadow: 0 5px 35px rgba(0,0,0,0.2); width: 33.33%; ">
					<th colspan="2" style="border:none; border-top: 1px solid black; border-bottom: 1px solid black; text-align: center;">Vas Profil</th>
					<tr>
						<td><b>Email:</b></td>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<td><b>Subject:</b></td>
						<td><?php echo $row['subject']; ?></td>
					</tr>
					<tr>
						<td><b>Text:</b></td>
						<td><?php echo $row['text']; ?></td>
					</tr>
				</table>
			</div>

			<a href="mail.php" class="btn btn-info">Vrati se nazad</a>


</div>

<?php }} ?>

	

	


















<?php include "includes/footer.php"; ?>