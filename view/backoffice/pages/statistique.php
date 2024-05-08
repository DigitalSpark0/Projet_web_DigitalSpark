
<?php
require_once "../../../controller/User/user.php";
require_once "../../../model/userC.php";
$controller = new userCRUD();

$db = config::getConnexion();

// Récupérer toutes les occurrences de lieu_commande
$queryAllLocations = $db->query("SELECT DISTINCT Role FROM user");
$queryAllLocations->execute();
$allLocations = $queryAllLocations->fetchAll(PDO::FETCH_COLUMN);

// Récupérer le nombre d'occurrences pour chaque lieu_commande
$locationCounts = [];
foreach ($allLocations as $location) {
    $queryCount = $db->prepare("SELECT COUNT(*) FROM user WHERE Role = :location");
    
    $queryCount->bindParam(':location', $location);
    $queryCount->execute();
    $locationCounts[$location] = $queryCount->fetchColumn();
}

// Convertir les données en format JSON pour une utilisation dans JavaScript
$locationCountsJSON = json_encode(array_values($locationCounts));
$locationLabelsJSON = json_encode(array_keys($locationCounts));


?>


<!DOCTYPE html>
<html lang="en">

<head>
<div class="container-fluid">
                   

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
    name="viewport" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="bootstrap.min.css" rel="stylesheet" />
  <link href="now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo.css" rel="stylesheet" />
    
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
</head>

<body class="user-profile">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    


            <div class="graphBox"  style="width: 400px; height: 400px;"  >
  <div class="box1">
  <canvas id="pieChart"></canvas> 
</div>
</div>
    </div>
    <br>
<div> 
    <script>
var locationCounts = <?php echo $locationCountsJSON; ?>;
var locationLabels = <?php echo $locationLabelsJSON; ?>;

var ctx = document.getElementById('pieChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: locationLabels,
        datasets: [{
            label: 'Nombre de commandes par lieu',
            data: locationCounts,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</div>

</head>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
  
    
</body>

</html>

