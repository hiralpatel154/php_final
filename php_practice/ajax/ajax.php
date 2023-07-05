<?php
include('../conn.php');
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $country_query = "SELECT * from states where country_id='".$id."'";
    $country_result = mysqli_query($conn, $country_query);
    $data= array();
    while($row=mysqli_fetch_array($country_result)){
        $id = $row['id'];
        $state=$row['state_name'];
        $data[$id] = $state;
    }
    echo json_encode($data);exit;
}


if(isset($_POST['stateId'])){
    $id=$_POST['stateId'];
    $country_query = "SELECT * from city where state_id='".$id."'";
    $country_result = mysqli_query($conn, $country_query);
    $data= array();
    while($row=mysqli_fetch_array($country_result)){
        $id = $row['id'];
        $city_name=$row['city_name'];
        $data[$id] = $city_name;
    }
    echo json_encode($data);exit;
}

if(isset($_POST['state_name'],$_POST['country_id'])){
    $state_name=$_POST['state_name'];
    $country_id = $_POST['country_id'];
    $state_query = "SELECT * from states where state_name='".$state_name."'";
    $state_result = mysqli_query($conn, $state_query);
    $count = mysqli_num_rows($state_result);
    $data= array();
    if($state_name !== ""){
    
        if($count > 0){
            $data["status"] = "False";
            $data["message"] = "This State Already Existed.";
        }
        else{
            $insert_state = "INSERT into states(state_name, country_id) values ('".$state_name."','".$country_id."')";
            $result = mysqli_query($conn, $insert_state);
    
            $last_id = mysqli_insert_id($conn);
            $data["status"] = "True";
            $data["state_id"] = $last_id;
            $data['name'] = $state_name;
            
          
    
        }
        echo json_encode($data);exit;
    }
    if($state_name == ""){
        $data["status"] = "Blank";
        $data["message"] = "This State is Blank.";
    }
   
    echo json_encode($data);exit;
    
}


?>