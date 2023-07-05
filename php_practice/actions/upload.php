<?php
include('../conn.php');

// if(isset($_POST['uploadfile'])){
//     $id=$_SESSION['id'];
//     $name = $_FILES["file"];
//     $target_folder = "../images/";
//     $target_file = $target_folder . basename($_FILES["file"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//     $extensions_arr = array("jpg","jpeg","png","gif");

    
//     if( in_array($imageFileType,$extensions_arr) ){
//         // Upload file
//         if(move_uploaded_file($_FILES['file']['tmp_name'],$target_folder.$name)){
//             // Insert record
//             // $query = "insert into user(user_image) values('".$name."')";
//             if (file_exists($target_file)) {
//                 echo "Sorry, file already exists.";
//                 $uploadOk = 0;
//             }
           

//             // Update record
//             $query = "update user set user_image='".$name."' where id='".$id."'";
//             mysqli_query($conn,$query);
//         }

//    }  
// }

if(isset($_POST['uploadfile']) && isset($_FILES['my_image'])){
    // echo "<pre>";
    // print_r($_FILES['my_image']);
    // echo "<pre>";
    $id=$_SESSION['id'];
    $img_name=$_FILES['my_image']['name'];
    $img_size=$_FILES['my_image']['size'];
    $tmp_name=$_FILES['my_image']['tmp_name'];
    $error=$_FILES['my_image']['error'];

    if($error === 0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg","jpeg","png");

        if(in_array($img_ex_lc, $allowed_exs))
        {
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = '../images/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            // Insert Into Database
            // $sql = "INSERT into user (user_image) VALUES ('$new_img_name')";

            // Update into database
            $sql = "UPDATE user set user_image='".$new_img_name."' where id='".$id."'";
            mysqli_query($conn, $sql);
            header("Location:../index.php?view=profile");
        }else{
            $em="You Can't upload files of this type";
            header("Location: index.php?error=$em");
        }
    }
    else{
        $em="unknown error occurred!";
        header("Location: index.php?error=$em");
    }
}
else{
    header("Location: index.php");
}


?>