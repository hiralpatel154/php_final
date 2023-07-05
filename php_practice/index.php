<?php
ob_start();
include('conn.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta itemprop="title" content="Amfare">
    <meta name="keywords" content="">
    <meta itemprop="description" content="">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- TITLE -->
    <title>User Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/style.css?ver=1.1">

</head>

<body>

    <?php
    if (!isset($_SESSION['id'])) {
        header('Location:login.php');
        exit();
    } else { 
       
        ?>
    <div class="container-fluid">
        <div class="row bg-white row-one">
            <?php
     include('templates/sidebar.php');
    ?>
            <div class="col-lg-10 free-trip main-content">
                <?php
            
            if ($_SESSION['id']) {
                $sql = "SELECT * FROM user WHERE id = '" . $_SESSION['id'] . "'";
                $result = mysqli_query($conn, $sql);
                $count= mysqli_num_rows($result);
                if($count>0)
                {
                    $row = mysqli_fetch_array($result);
                }
            }
            include('templates/header.php');
            
            if (isset($_GET['view'])) {
                $page_view = trim($_GET['view']);
            } else {
                $page_view = 'home';
            }
            if ($page_view) {
                $sql1 = "SELECT * FROM pages WHERE file_name = '" . $page_view . "'";
                $result1 = mysqli_query($conn, $sql1);
                $count = mysqli_num_rows($result1);
                if ($count > 0) {
                    $row1 = mysqli_fetch_array($result1);
                    include($row1['file_path']);
                } else {
                    include('pages/404.php');
                }
            }
            ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <script src="//code.jquery.com/jquery-1.11.3.js"></script>
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
  
    

    
    <script src="js/custom.js"></script>
    
</body>

</html>