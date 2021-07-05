<?php include "includes/header.php"; ?>

<?php


if(isset($_POST["login"])){
	$korime = $_POST["username"];
	$lozinka = $_POST["pwd"];

	$odg = logovanje($korime,$lozinka);
	
}


?> 

<div class="row" style="width: 400px; height: 350px; margin: auto; background-color: #e6eaf0; padding: 15px; margin-bottom: 15px; border: 1px solid grey; border-radius: 6px;">
	<h1>Login</h1>
	<?php if($odg==1){
		header("location: index.php");
	} else {
		echo $odg;
	} ?> 
	<form method="post" action="login.php">
		<div class="txt_field">
			<input type="text" name="username" placeholder="Unesite korisnicko ime">
		</div>
		<div class="txt_field">
			<input type="password" name="pwd" placeholder="Unesite sifru">
		</div>
		<input type="submit" name="login" value="Prijavite se"><br><br>
		<div class="link">
			<p>Nemate nalog? <a href="registracija.php">Registrujte se</a></p>
		</div><br>
	</form>
</div>



<?php include "includes/footer.php"; ?>