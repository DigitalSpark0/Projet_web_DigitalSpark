<?php 
include "../../../controller/reponsesC.php";
if(isset($_GET['idrep'])) {
    // Récupérez l'ID de réponse depuis l'URL
    $idrep = $_GET['idrep'];
    // Utilisez cet ID comme vous le souhaitez dans votre script
} else {
    // Gérez le cas où l'ID de réponse n'est pas présent dans l'URL
    echo "ID de réponse non trouvé dans l'URL";
}
$content = isset($_POST["contenu"]) ? $_POST["contenu"] : 'erreur';
    $dater2 = isset($_POST["dater2"]) ? $_POST["dater2"] : 'erreur';
    $idr3 = isset($_POST["idr3"]) ? $_POST["idr3"] : 'erreur';
    $idr = isset($_POST["idr"]) ? $_POST["idr"] : 'erreur';
    // Instanciez l'objet reponsesC
    $reponceC = new reponsesC();
    
    // Appelez la fonction update avec les données postées
    $reponceC->update($_POST["idr3"], $content, $dater2);
    header('Location: tables0.php');

?>