<?php
if(isset($_POST['submit'])){

    $get_country = $_POST['country_list'];
    $state_name =$_POST['state_name'];
    if (!empty($state_name)) {
        $select = "SELECT * FROM states WHERE state_name = '" . $state_name . "'";
        $select_res = mysqli_query($conn, $select);
        $count = mysqli_num_rows($select_res);

    if ($count > 0) {
            $_SESSION["err"] = "State Already Exists";
            header('Location: index.php?view=read_state');
            die();
        }
        else{
            $_SESSION["msg"] = "Added State Suceesfully";
            $sql = "INSERT into states(state_name, country_id) values ('".$state_name."','".$get_country."')" ;
            $result = mysqli_query($conn, $sql);
            if($result == TRUE){
                header("Location:./index.php?view=read_state");
            }
        }
    }
    else{
        $_SESSION["err"] = "Add State Name";
        header('Location: ./index.php?view=add_state');
        die();
    }
   
    

    
}


?>