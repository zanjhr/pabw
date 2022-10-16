<html>
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
            width: 500px;
            margin: 0 auto;
        }
    </style>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Import <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <br>
                        <h2>Tambah Data Penjualan</h2>
                    </div>
                    <br>
                    <form action="create.php" method="post" name="form1">
                        <div class="form-group">
                        <div class="form-group">
                            <label><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Pohon</b></label>
                            <input type="text" name="pohon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Harga</b></label>
                            <input type="text" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Petani</b></label>
                            <input type="text" name="petani" class="form-control">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success" name="Submit" value="Add">Tambah</button>
                        <a href="index.php" class="btn btn-info">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <br/><br/>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $pohon = $_POST['pohon'];
        $harga = $_POST['harga'];
        $petani = $_POST['petani'];
        header("Location: index.php");
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO penjualan(nama, pohon, harga, petani) VALUES('$nama','$pohon','$harga','$petani')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>