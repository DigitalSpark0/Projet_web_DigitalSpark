<?php
// Inclure la bibliothèque QRcode
require 'phpqrcode/qrlib.php';

// Récupérer les données de l'offre depuis la page principale
$titre_offre = isset($titre_offre) ? $titre_offre : "Offre"; // Si $titre_offre n'est pas défini, utiliser "Offre" par défaut

// Générer le contenu du code QR
$codeContents = $titre_offre;

// Chemin et nom de fichier pour enregistrer le code QR
$fileName = 'qrcodes/'.$titre_offre.'.png';

// Générer le code QR
QRcode::png($codeContents, $fileName, QR_ECLEVEL_L, 10);

// Afficher le code QR
echo '<img src="'.$fileName.'" alt="QR Code">';
?>
