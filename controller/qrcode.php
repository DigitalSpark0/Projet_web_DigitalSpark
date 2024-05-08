<?php
include '../phpqrcode/qrlib.php';

if(isset($_GET['qr'])) {
    $id_offre = $_GET['qr'];

    include_once "../config.php";
    $pdo = config::getConnexion();

    $sql = "SELECT * FROM offre WHERE id_offre = :id_offre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_offre' => $id_offre]);
    $matiere = $stmt->fetch(PDO::FETCH_ASSOC);

    if($matiere) {
        $id_offre = $matiere['id_offre'];
        $statut = $matiere['statut'];
        $description = $matiere['description'];
        $date_pub = $matiere['date_pub']; // Correction de la variable non définie
        $titre = $matiere['titre'];
        $entreprise = $matiere['entreprise'];

        $qr_content = "id_offre: $id_offre\n";
        $qr_content .= "statut: $statut\n";
        $qr_content .= "description: $description\n";
        $qr_content .= "titre: $titre\n";
        $qr_content .= "date_pub: $date_pub\n";
        $qr_content .= "entreprise: $entreprise\n";

        $filename = 'qrcode.png';

        // Générer le code QR sans spécifier $cmyk
        QRcode::png($qr_content, $filename);

        echo '<img src="' . $filename . '" />';
    } else {
        echo "Erreur: L'ID de matière à scanner n'existe pas.";
    }
} else {
    echo "Erreur: ID de matière à scanner non spécifié.";
}
?>
