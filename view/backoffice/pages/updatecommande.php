<?php 
include "C:/xampp/htdocs/projet web (gestion services)/controller/CommandeController.php";
include "C:/xampp/htdocs/projet web (gestion services)/config.php";
$idcommande=isset($_POST["idup"]) ?$_POST["idup"]:'erreur';
$idserv=isset($_POST["idsse"]) ?$_POST["idsse"]:'erreur';
$datee=isset($_POST["da"]) ?$_POST["da"]:'erreur';
$stattt=isset($_POST["st"]) ?$_POST["st"]:'erreur';
$montanttt=isset($_POST["mo"]) ?$_POST["mo"]:'erreur';
?>
<!DOCTYPE html>
<html>
    <body>
    <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h3 class="modif">modifier la commande</h3>
                    </div>
                  </div>
                  <form id="comm" action="updatecommande2.php" method="post">
                    <section align="center">
                      <label for="titre_ser">idservice:</label>
                      <input type="text" id="idservv" name="idserv" value="<?php echo $idserv;?>">
                      <br><br>
                      <label for="titre_ser">date_c:</label>
                      <input type="text" id="datt" name="datee" value="<?php echo $datee;?>">
                      <br><br>
                      <label for="titre_ser">statut_c:</label>
                      <input type="text" id="statt" name="stattt" value="<?php echo $stattt;?>">
                      <br><br>
                      <label for="titre_ser">montant_c:</label>
                      <input type="text" id="montantt" name="montantt" value="<?php echo $montanttt;?>">
                      <input type="hidden" id="idcc" name="idcc" value="<?php echo $idcommande;?>">
                    </section>
                    <button class="modifff" type="submit">modifier</button>
                  </form>
    </body>
</html>