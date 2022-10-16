<?php 
    include 'vendor/fusioncharts/integrations/php/samples/includes/fusioncharts.php';
    $hostdb = "localhost";
    $userdb = "root";
    $passdb = "";
    $namedb = "pohongue";

    $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
    if ($dbhandle->connect_error) {
    exit("There was an error with your connection: " . $dbhandle->connect_error);
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="img/logo.png">
    <title>PohonGue</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>


    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="50" height="65"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="fusion.php">Fusion Chart <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    
    <br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Fusion Charts</h2>
                    </div>
                    <br>
                    <?php 
                        $query = "SELECT *, COUNT(nama) as jml from penjualan";
                        $result = $dbhandle->query($query);
                        $row = mysqli_fetch_array($result)

                     ?>
                     <h1><?= $row['jml'] ?></h1>
                    <br>
                    <?php
                        $strQuery = "SELECT *, COUNT(pohon) AS jns FROM penjualan GROUP BY(pohon) ORDER BY pohon ASC";

                        $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

                        if ($result) {
                            $arrData = array(
                                "chart" => array(
                                    "caption" => "Pohon Berdasarkan pohon",
                                    "showValues" => "0",
                                    "theme" => "fusion"
                                )
                            );

                            $arrData["data"] = array();

                            while ($row = mysqli_fetch_array($result)) {
                                array_push(
                                    $arrData["data"],
                                    array(
                                        "label" => $row["pohon"],
                                        "value" => $row["jns"]
                                    )
                                );
                            }

                            $jsonEncodedData = json_encode($arrData);

                            $columnChart = new FusionCharts("column2D", "myFirstChart", 700, 400, "chart-1", "json", $jsonEncodedData);

                            $columnChart->render();
                            $dbhandle->close();
                        }
                        ?>

                        <div class="col-lg-8 offset-lg-2">
                            <div id="chart-1"></div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</body>
</html>