<div class="wrapper mx-5">
    <div class="col-md-12">
        <div class="box box-info">
            <form name="updatepage" method="post" action="actions/update_country.php" class="has-validation-callback">
                <?php
                        $id = $_GET['id'];
                        $query = "SELECT * from country where  id = '".$id."'";
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
                                                <th colspan="2" class="text-center">Update Country</th>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td><input type="text" name="country_name"
                                                        value="<?php echo $row['country_name'];?>" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-center">
                                                    <a href="index.php?view=update_country"><input type="submit"
                                                            class="btn btn-success" value="Update" name="submit"></a>
                                                    <a href="index.php?view=read_country" class="btn btn-danger">Cancel</a>
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