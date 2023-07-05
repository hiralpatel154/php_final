<?php
include('../conn.php');
// echo $result;

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $country_name = $_POST['country_name'];
   
   
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";

    $update = "UPDATE country set country_name='" . $country_name . "' where id='".$id."'";
    
    // echo $update;exit;
    $result = mysqli_query($conn, $update);
    if ($result == TRUE) {
        header('location:../index.php?view=read_country');
        exit;
    }
    else {
        echo "Error updating record: " . $conn->error;
      }
}
?>