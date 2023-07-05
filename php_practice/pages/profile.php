
<!DOCTYPE html>
<html lang="en">
<?php
$id=$_SESSION['id'];
$query2 = "SELECT c.country_name as cname, s.state_name as sname, ct.city_name as ctname from user u INNER JOIN country as c on c.id = u.country INNER JOIN states as s on s.id = u.state INNER JOIN city as ct on ct.id = u.city where u.id = '".$id."'";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_array($result2);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <?php
                 $sql = "SELECT * FROM user where id='".$id."'";
                  $res = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($res);
                  if(mysqli_num_rows($res)>0){
                    while($user = mysqli_fetch_assoc($res)){?>
                    <img src="images/<?=$user['user_image']?>" style="width:150px;">
                    <?php }
                  }
                ?>
                    <h5 class="my-3"> <?php echo $row['username']; ?></h5>


                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['username']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['email']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row['contact']?></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Country</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row2['cname']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">State</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row2['sname']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">City</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $row2['ctname']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Image</p>
                        </div>
                        <?php if(isset($_GET['error'])): ?>
                        <p><?php echo $_GET['error'];?></p>
                        <?php endif ?>
                        <form method="post" action="actions/upload.php" enctype='multipart/form-data'>
                            <input type='file' name='my_image' />
                            <input type='submit' value='Upload' name='uploadfile'>
                        </form>
                    </div>
                </div>


            </div>
            <a href="index.php?view=edit_profile" class="btn btn-warning w-50">Edit Profile</a>
        </div>

</body>

</html>