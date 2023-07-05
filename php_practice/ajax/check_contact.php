<?php
include('../conn.php');
if(isset($_POST['contact'])){
    $contact = $_POST['contact'];
    $checkcontact = "SELECT * FROM user WHERE contact = '" . $contact . "'";
    $select_res = mysqli_query($conn, $checkcontact);
    $count = mysqli_num_rows($select_res);
    $data = Array();
    if($count > 0){
        // echo "False";
        // exit;
        $data["status"] = "False";
        $data["message"] = "This Contact Already Existed.";
    }
    else{
        // echo "True";
        // exit;
        $data["status"] = "True";
       
    }
    echo json_encode($data);exit;
}


?>