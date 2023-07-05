<?php
include('../conn.php');
// echo $result;

if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $id = $_POST['id'];
    $country = $_POST['country'];
    $city_name = $_POST['city_name'];
    $state_list = $_POST['state_list'];
   
    

    $update = "UPDATE city set con_id='" . $country . "', state_id='".$state_list."', city_name='".$city_name."' where id='".$id."'";
    
    // echo $update;exit;
    $result = mysqli_query($conn, $update);
    if ($result == TRUE) {
        header('location:../index.php?view=read_city');
        exit;
    }
    else {
        echo "Error updating record: " . $conn->error;
      }
}
?>