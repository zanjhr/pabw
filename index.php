<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
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
    <form action="" method="POST" class="login-email">
            <?php echo "<h6>Welcome, " . $_SESSION['username'] ."!". "</h6>"; ?>
                       
        </form>
        <a href="logout.php" class="btn"><i class="material-icons">logout</i></a>
  </div>
</nav>
    
    <br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Data Penjualan</h2>
                    </div>
                    <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                    <br>
                    <br>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM penjualan";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered'>";
                                echo "<thead>";
                                    echo "<tr class='table-active'>";
                                        echo "<th align=center>No</th>";
                                        echo "<th>Nama </th>";
                                        echo "<th>Pohon</th>";
                                        echo "<th>Harga</th>";
                                        echo "<th>Petani</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $nomor = 1;
                                while($user_data = mysqli_fetch_array($result)) {         
                                    echo "<tr>";
                                    echo "<td>".$nomor."</td>";
                                    echo "<td>".$user_data['nama']."</td>";
                                    echo "<td>".$user_data['pohon']."</td>";
                                    echo "<td>".$user_data['harga']."</td>";
                                    echo "<td>".$user_data['petani']."</td>";
                                        echo "<td>";
                                            echo "<a href='edit.php?id=". $user_data['id'] ."' title='Update Record' data-toggle='tooltip'><i class='material-icons'>edit</i></a>";
                                            echo "<a href='delete.php?id=". $user_data['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='material-icons'>delete</i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                    $nomor++;
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                    <?php include ("import.php")?>
                    <form method="POST" enctype="multipart/form-data" action="">
                        Masukan Data dari Excel: 
                        <input name="filexls" type="file" required="required" id="fomrFile"> 
                        <input name="submit" type="submit" value="Import">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>