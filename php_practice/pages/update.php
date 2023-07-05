<?php

// echo $result;

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $file_name = $_POST['file_name'];
    $file_path = $_POST['file_path'];
    $file_type = $_POST['file_type'];
    $status = $_POST['status'];
    $user_type=$_POST['user_type'];
    $file_type=$_POST['file_type'];
   
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";

    $update = "UPDATE pages set file_name='" . $file_name . "', file_path='" . $file_path . "', status='" . $status . "',user_type='". $user_type ."',file_type='".$file_type."' where id='".$id."'";
    
    // echo $update;exit;
    $result = mysqli_query($conn, $update);
    if ($result == TRUE) {
        header('location:index.php?view=read&id='.$id);
        exit;
    }
    else {
        echo "Error updating record: " . $conn->error;
      }
}
?>



<div class="wrapper mx-5">
    <div class="col-md-12">
        <div class="box box-info">
            <form name="updatepage" method="post" action="index.php?view=update" class="has-validation-callback">
                <?php
                        $id = $_GET['id'];
                        //echo $id;
                        $query = "SELECT * from pages where  id = '".$id."'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $count = mysqli_num_rows($result);
                        if($count>0){ ?>

                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">&nbsp;</div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr class="danger">
                                                    <th colspan="2" class="text-center">Update Page</th>
                                                </tr>
                                                <tr>
                                                    <th>Page Type:</th>
                                                    <td><label><input type="radio" name="user_type" value="admin"
                                                                <?php echo ($row['user_type'] =='admin')?'checked':'' ?>>Admin(admin
                                                            side)</label>
                                                        <label><input type="radio" name="user_type" value="user"
                                                                <?php echo ($row['user_type']=='user')?'checked':'' ?>>User(front
                                                            side)</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Page View:</th>
                                                    <td><input type="text" name="file_name" value="<?php echo $row['file_name'];?>"
                                                            class="form-control" data-validation="required"></td>
                                                </tr>
                                                <tr>
                                                    <th>Page File Type:</th>
                                                    <td><select name="file_type" class="form-control" data-validation="required">
                                                            <option <?php if ($row['file_type'] == 'pages') echo ' selected="selected"'; ?> >Pages</option>
                                                            <option <?php if ($row['file_type'] == 'actions') echo ' selected="selected"'; ?> value="actions">Actions</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <th>Page File:</th>
                                                    <td><input type="text" name="file_path" value="<?php echo $row['file_path'];?>"
                                                            class="form-control" data-validation="required"></td>
                                                </tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td><label><input type="radio" name="status" value="active"
                                                                <?php echo ($row['status'] =='active')?'checked':'' ?>>Active</label>
                                                        <label><input type="radio" name="status" value="deactive"
                                                                <?php echo ($row['status'] =='deactive')?'checked':'' ?>>De-active</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-center">
                                                        <a href="index.php?view=read"><input type="submit" class="btn btn-success"
                                                                value="Update" name="submit"></a>
                                                        <a href="index.php?view=home" class="btn btn-danger">Cancel</a>
                                                    </th>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php }
                                else{
                                    echo "<h1 class='text-center m-5'>Data is Not Found</h1>";
                                }
                ?>
            </form>
        </div>
    </div>
</div>