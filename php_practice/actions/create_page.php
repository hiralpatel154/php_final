
<?php
if (isset($_POST['submit'])) {
    $file_name = $_POST['file_name'];
    $file_path = $_POST['file_path'];
    $status = $_POST['status'];
    $user_type=$_POST['user_type'];
    $file_type=$_POST['file_type'];
    $sql = "INSERT INTO pages(user_type, file_name, file_path, status, file_type) VALUES('" . $user_type . "','" . $file_name . "','" . $file_path . "','" . $status . "','".$file_type."')";
    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {
        header("Location:./index.php?view=read");
    }
}

?>