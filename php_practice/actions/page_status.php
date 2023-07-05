<?php
include('../conn.php');

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

// // previous logic for update active deactive status
// $sql = "UPDATE pages SET status='".$_GET['status']."' WHERE id = '".$_GET['id']."'";
// echo $sql;exit;


$id=$_GET['id'];
$status= $_GET['status'];

$query1 = "SELECT * from pages where  id = '".$id."'";
$result1 = mysqli_query($conn,$query1);
$count = mysqli_num_rows($result1);

if($count>0){
    $sql = "UPDATE pages SET status='".$status."' WHERE id = '".$id."'";
// echo $sql;exit;
$result = $conn->query($sql); 
if ($result == TRUE) {
    
    echo "Record updated successfully.";

}else{

    echo "Error:" . $sql . "<br>" . $conn->error;

}
}else{
    $_SESSION["err"] = "Data is Not available for status update";
    header("Location:../index.php?view=read");
}

mysqli_query($conn, $sql);
header("Location:../index.php?view=read");
?>