<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];    
    $nama = $_POST['nama'];
    $pohon = $_POST['pohon'];
    $harga = $_POST['harga'];
    $petani = $_POST['petani'];
    
        
    // update user data
    $result = mysqli_query($conn, "UPDATE penjualan SET nama='$nama', pohon='$pohon', harga='$harga', petani='$petani' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM penjualan WHERE id='" . $_GET['id'] . "'");

$row = mysqli_fetch_array($result);
?>
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
                        <h2>Edit Data Pohon</h2>
                    </div>
                    <br>
                    <form name="update" method="post" action="edit.php">
                        <div class="form-group">
                            <label><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label><b>Pohon</b></label>
                            <textarea name="pohon" class="form-control"><?php echo $row['pohon']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Harga</b></label>
                            <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <label><b>Petani</b></label>
                            <input type="text" name="petani" class="form-control" value="<?php echo $row['petani']; ?>">
                        </div>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                            
                            <button class="btn btn-success" type="submit" name="update" value="Update">Tambah</button>
                            <a href="index.php" class="btn btn-info">Cancel</a>
                        </tr>
                    </form>
                </div>
            </div>        
        </div>
    </div>

    <br/><br/>
    
</body>
</html>