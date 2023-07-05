<!-- Edit State Data-->

<div class="row bg-white row-one">
    <div class="container col-lg-10 free-trip main-content">
        <div class="wrapper mx-5">
            <div class="col-md-12">
                <div class="box box-info">
                    <form name="addpage" method="post" action="actions/update_city.php" class="has-validation-callback">
                        <?php
                            $id = $_GET['id'];
                            $query = "SELECT * from city where  id = '".$id."'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            
                            $query2 = "SELECT * from country";
                            $result2 = mysqli_query($conn, $query2);

                            $query3 = "SELECT * from states where country_id = ".$row['con_id']."";
                            $result3 = mysqli_query($conn, $query3);

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
                                                        name="country" id="country">
                                                        <?php
                                                                while($row2 = mysqli_fetch_assoc($result2)){
                                                                 
                                                            ?>

                                                        <option value="<?php echo $row2['id'];?>"
                                                            name="<?php echo $row2['country_name'];?>"
                                                            <?php if($row['con_id'] == $row2['id']) { echo "selected"; }?>>
                                                            <?php echo $row2['country_name'] ?>
                                                        </option>
                                                        <?php }?>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>State Name</th>
                                                <td>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="state_list" id="state">
                                                        <?php
                                                                while($row3 = mysqli_fetch_assoc($result3)){
                                                                 
                                                            ?>

                                                        <option value="<?php echo $row3['id'];?>"
                                                            name="<?php echo $row3['state_name'];?>"
                                                            <?php if($row['state_id'] == $row3['id']) { echo "selected"; }?>>
                                                            <?php echo $row3['state_name'] ?>
                                                        </option>
                                                        <?php }?>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>City Name</th>
                                                <td>
                                                    <input type="text" name="city_name"
                                                        value="<?php echo $row['city_name'];?>" class="form-control">

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
                                                    <a href="index.php?view=read_city" class="btn btn-danger">Cancel</a>
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