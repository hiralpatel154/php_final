<?php
include('../conn.php');
// echo $result;

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $country_list = $_POST['country_list'];
    $state_name = $_POST['state_name'];
   
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $update = "UPDATE states set country_id='" . $country_list . "', state_name='".$state_name."' where id='".$id."'";
    
    // echo $update;exit;
    $result = mysqli_query($conn, $update);
    if ($result == TRUE) {
        header('location:../index.php?view=read_state');
        exit;
    }
    else {
        echo "Error updating record: " . $conn->error;
      }
}
?>