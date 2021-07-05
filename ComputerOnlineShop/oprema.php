<?php  include "includes/header.php"; 

$user_logged_in = false;
if (isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]){
  $user_logged_in = true;
}

if (isset($_POST['dodaj'])) {
  $korime = $_POST['korime'];
  $proizvod = $_POST['marka'];
  $kolicina = $_POST['kolicina'];
  $cena = $_POST['cena'];
  $slika = $_POST['slika'];
  $ukupnaCena = intval($cena)*intval($kolicina);
  $odg=dodajUKorpu($korime,$proizvod,$kolicina,$slika,$cena,$ukupnaCena);
  if($odg == 1) {
    $odg = '<p class="bg-info" style="text-align:center;">Proizvod je dodat u korpu!</p>';
  }
  echo $odg;
}

?>



<div class="row">
<?php 
$result = vratiProizvode();



if ($result->num_rows > 0) {
          // output data of each row
  while($row = $result->fetch_assoc()) {  

    if($row['tip']=="oprema") {?>

      

        <div class="cont" style="margin: 3px 70px;">
          <div class="card" style="height: 550px;">
            <div class="box" style="height: 500px;">
              <div class="content" style="padding: 5px;">
                <h2 style="position: absolute;  right: 25px; font-size: 52px;">O</h2><br>
                <img width="100px" height="100px" style="position: absolute; left: 91px;" src="<?php echo $row['slika']; ?>" alt="komjuteri"><br>
                <h3 style="font-size: 22px;"><?php echo $row['marka']; ?></h3>
                <p><?php echo $row['cena'] . ",00 RSD"; ?></p>
                <?php
                echo '<form method="post" action="oprema.php">
                <input type="hidden" name="korime" value="'.$_SESSION["podaci"]["korime"].'">
                <input type="text" name="kolicina" value="1" style="width: 30px; color: black;"><br><br>
                <input type="hidden" name="slika" value="' .$row["slika"] .'">
                <input type="hidden" name="marka" value="' .$row["marka"] .'">
                <input type="hidden" name="cena" value="' .$row["cena"] .'">

                <button type="submit" 
                class="btn btn-success" 
                name="dodaj" value="'.$row["id"].'">Dodaj u korpu</button></form>'; ?>
               
              </div>
            </div>
          </div>
        </div>





        <?php

      }}
    } else {
      echo "0 results";
    }

    ?>
  </div>








  <?php  include "includes/footer.php"; ?>