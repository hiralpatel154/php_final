<!-- Edit State Data-->

<div class="row bg-white row-one">
    <div class="container col-lg-10 free-trip main-content">
        <div class="wrapper mx-5">
            <div class="col-md-12">
                <div class="box box-info">
                    <form name="addpage" method="post" action="actions/update_state.php"
                        class="has-validation-callback">
                        <?php
                            $id = $_GET['id'];
                            $query = "SELECT * from states where  id = '".$id."'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            
                            $query2 = "SELECT * from country";
                            $result2 = mysqli_query($conn, $query2);
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
                                                <th colspan="2" class="text-center">Add State</th>
                                            </tr>
                                            <tr>
                                                <th>Country Select</th>
                                                <td>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="country_list">
                                                        <?php
                                                                while($row2 = mysqli_fetch_assoc($result2)){
                                                                 
                                                            ?>

                                                        <option value="<?php echo $row2['id'];?>"
                                                            name="<?php echo $row2['country_name'];?>"
                                                            <?php if($row['country_id'] == $row2['id']) { echo "selected"; }?>>
                                                            <?php echo $row2['country_name'] ?>
                                                        </option>
                                                        <?php }?>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>State Name</th>
                                                <td>
                                                    <input type="text" name="state_name"
                                                        value="<?php echo $row['state_name'];?>" class="form-control">

                                                </td>
                                            </tr>


                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a href="index.php?view=update_state"><input type="submit"
                                                            class="btn btn-success" value="Update" name="submit"></a>
                                                    <!-- <a href="./actions/add_state_page.php" type="button" value="Add" name="submit" id="insert" class="btn btn-success">Add</a> -->
                                                    <!-- <input type="submit" class="btn btn-success" value="Add"
                                                        name="submit" id="insert"> -->
                                                    <a href="index.php?view=read_state"
                                                        class="btn btn-danger">Cancel</a>
                                                </td>
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
    </div>
</div>