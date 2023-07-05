<?php
if(isset($_POST['submit'])){
    $country_name = $_POST['country_name'];

    if (!empty($country_name)) {
        $select = "SELECT * FROM country WHERE country_name = '" . $country_name . "'";
        $select_res = mysqli_query($conn, $select);
        $count = mysqli_num_rows($select_res);
        
        if ($count > 0) {
            $_SESSION["err"] = "Country Already Exists";
            header('Location: index.php?view=read_country');
            die();
        }
        else{
            $_SESSION["msg"] = "Added Country Suceesfully";
            $sql = "INSERT into country(country_name) values ('".$country_name."')";
            $result = mysqli_query($conn, $sql);
            if($result == TRUE){
                header("Location:./index.php?view=read_country");
            }
        }   
    }
    else{
        $_SESSION["err"] = "Add Country Name";
        header('Location: ./index.php?view=add_country');
        die();
    }
}
?>