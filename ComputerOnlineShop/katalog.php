<?php  include "includes/header.php"; 

$user_logged_in = false;
if (isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"]){
  $user_logged_in = true;
}

// if (isset($_POST['dodaj'])) {
//   $korime = $_POST['korime'];
//   $proizvod = $_POST['marka'];
//   $kolicina = $_POST['kolicina'];
//   $cena = $_POST['cena'];
//   $slika = $_POST['slika'];
//   $ukupnaCena = intval($cena)*intval($kolicina);
//   $odg=dodajUKorpu($korime,$proizvod,$kolicina,$slika,$cena,$ukupnaCena);
//   if($odg == 1) {
//     $odg = '<p class="bg-info" style="text-align:center;">Proizvod je dodat u korpu!</p>';
//   }
//   echo $odg;
// }

?>



<div class="row">
<?php 
$result = vratiProizvode();



if ($result->num_rows > 0) {
          // output data of each row

 
  while($row = $result->fetch_assoc()) {  

 
     
      ?>

      

        <div class="cont" style="margin: 3px 70px;">
          <div class="card" style="height: 550px;">
            <div class="box" style="height: 500px;">
              <div class="content" style="padding: 5px;">
                <h2 style="position: absolute;  right: 25px; font-size: 52px;">L</h2><br>
                <img width="100px" height="100px" style="position: absolute; left: 91px;" src="<?php echo $row['slika']; ?>" alt="komjuteri"><br>
                <h3 style="font-size: 22px;"><?php echo $row['marka']; ?></h3>
                <p><?php echo $row['cena'] . ",00 RSD"; ?></p>
                <a href="login.php" class="btn btn-success">Dodaj u korpu</a>
                
               
              </div>
            </div>
          </div>
        </div>

        <?php 
      }
    } else {
      echo "0 results";
    }

    ?>
  </div>








  <?php  include "includes/footer.php"; ?>