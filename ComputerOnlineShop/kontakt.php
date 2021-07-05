<?php include "includes/header.php"; ?>

<?php 

if (isset($_POST['salji'])) {
	// echo "registracija";
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$text = $_POST["text"];
	


	$odg = posaljiMail($email,$subject,$text);
	if($odg==1){
		$odg='<p class="bg-info" style="text-align:center; color: black;">Mail je poslat!</p>';
	}


}





?>


<div class="container-fluid bg-grey" style="background: rgba(255,255,255,0.1); border-radius: 6px; box-shadow: 0 5px 35px rgba(0,0,0,0.2); margin-bottom: 30px; color: #c8cbcf;">
	<h2 class="text-center">Kontaktirajte nas</h2>
	<?php echo $odg ?> 
	<div class="row" >
		<div class="col-sm-5">
			<p>Kontaktirajte nas, a mi cemo vam odgovoriti u sto brzem roku.</p>
			<p><span class="glyphicon glyphicon-map-marker"></span> Jovana Serbanovica 6, 12000 Pozarevac</p>
			<p><span class="glyphicon glyphicon-phone"></span> +381 12 55 75 998</p>
			<p><span class="glyphicon glyphicon-envelope"></span> compshop@gmail.com</p>
		</div>
		<div class="col-sm-7">
			<form method="post" action="kontakt.php">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" id="email" name="email" placeholder="Unesite vase email" type="email" required>
				</div>
				<div class="col-sm-6 form-group">
					<input class="form-control" id="subject" name="subject" placeholder="Unesite subject" type="text" required>
				</div>
			</div>
			<textarea class="form-control" id="text" name="text" placeholder="" rows="5"></textarea><br>
			<div class="row">
				<div class="col-sm-12 form-group">
					
					<button class="btn btn-success pull-right" type="submit" name="salji">Posalji</button>
				
				</div>
			</div>
		</form>
		</div>
	</div>
</div>






		<?php include "includes/footer.php"; ?>