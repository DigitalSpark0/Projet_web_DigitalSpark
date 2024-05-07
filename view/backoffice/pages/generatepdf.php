<?php
ob_start();
require_once "C:/xampp/htdocs/ProjetWebQH/view/backoffice/pages/vendor/autoload.php";
require_once "C:/xampp/htdocs/ProjetWebQH/controller/User/user.php";
$controller = new userCRUD();
$userList = $controller->listUsers();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    // Créer une instance de TCPDF
    $pdf = new TCPDF();
    
    // Définir les informations du document
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('ons');
    $pdf->SetTitle('Table des utilisateurs PDF');
    $pdf->SetSubject('user Table');

    // Ajouter une page
    $pdf->AddPage();

    // Définir la police
    $pdf->SetFont('dejavusans', '', 12);

    // Construire le contenu HTML de la table des utilisateurs
    $html = '<h1 style="text-align: center;">Users Table</h1>';
    $html .= '<table border="1" cellpadding="5" style="width: 100%;">';
    $html .= '<thead><tr><th>ID</th><th>prenom</th><th>nom</th><th>email</th><th>Role</th></tr></thead>';
    $html .= '<tbody>';
    
    foreach ($userList as $user) {
        $html .= '<tr>';
        $html .= '<td>' . $user['id_utilisateur'] . '</td>';
        $html .= '<td>' . $user['prenom'] . '</td>';
        $html .= '<td>' . $user['nom'] . '</td>';
        $html .= '<td>' . $user['Email'] . '</td>';
        $html .= '<td>' . $user['Role'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody></table>';

    // Écrire le contenu HTML dans le PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Télécharger le fichier PDF
    $pdf->Output('user_table.pdf', 'D');
    exit;
}
?>
