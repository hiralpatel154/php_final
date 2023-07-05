<?php 
include('../conn.php');
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if(isset($_POST['edit'])){
    $id=$_SESSION['id'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $country= $_POST['country'];
    $state = $_POST['state_list'];
    $city = $_POST['city_list'];
    $query = "SELECT * from user where  id = '".$id."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    $res = $row['id'];
    if($res == $id){
      $update = "update user set username='".$username."',email='".$email."', contact='".$contact."', country='".$country."',state='".$state."',city='".$city."' where id='".$id."'";
      $sql2=mysqli_query($conn,$update);
        if($sql2){
            // echo "updated"; exit;
            header('location:../index.php?view=profile');
        }
        else
       {
        // echo "not updated"; exit;
           header('location:../index.php?view=edit_profile');
       }
    }
    else
    {
        header('location:../index.php?view=edit_profile');
    }
}
?>