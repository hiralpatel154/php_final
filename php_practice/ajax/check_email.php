<?php
include('../conn.php');
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $checkemail = "SELECT * FROM user WHERE email = '" . $email . "'";
    $select_res = mysqli_query($conn, $checkemail);
    $count = mysqli_num_rows($select_res);
    $data = Array();
    if($count > 0){
        // echo "False";
        // exit;
        $data["status"] = "False";
        $data["message"] = "This Email Already Existed.";
    }
    else{
        // echo "True";
        // exit;
        $data["status"] = "True";
       
    }
    echo json_encode($data);exit;
}


?>