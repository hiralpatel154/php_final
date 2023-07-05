<div class="main-content-detail align-item-center">
    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="d-flex justify-content-center bg-white">
        <?php if (!isset($_SESSION['id']) || empty($_SESSION['id'])) { ?>
        <a type="submit" class="btn btn-success btn-lg" value="login" href="login.php"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign In</a>
        <p class="d-flex align-item-center justify-content-center">to view content</p>
        <?php } else { ?>
        <div class="dropdown">
            <button class="btn dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php
                 $id=$_SESSION['id'];
                 $sql = "SELECT * FROM user where id='".$id."'";
                  $res = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($res);
                  if(mysqli_num_rows($res)>0){
                    while($user = mysqli_fetch_assoc($res)){?>
                        <img src="images/<?=$user['user_image']?>" style="width:50px;">
                    <?php }
                  }
                ?>
                <?php echo $row['username']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index.php?view=profile">Profile</a>
                <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
        </div>



        <?php } ?>

    </nav>

</div>