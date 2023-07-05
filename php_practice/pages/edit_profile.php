<div class="wrapper mx-5">
    <div class="col-md-12">
        <div class="box box-info">
            <form name="updatepage" method="post" action="actions/update_profile.php" class="has-validation-callback">
                <?php
                    $id=$_SESSION['id'];
                    $username= $row['username'];
                    $email= $row['email'];
                    $contact= $row['contact'];
                    $country = $row['country'];
                    $state = $row['state'];
                    $city = $row['city'];
                    // $query = "SELECT * from user where  id = '".$id."'";
                    // $row = mysqli_fetch_assoc($result);
                    // $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                    $cquery = "SELECT * from country";
                    $cresult = mysqli_query($conn, $cquery);

                    $squery = "SELECT * from states where country_id = '".$country."'";
                    $sresult = mysqli_query($conn, $squery);

                    $ctquery = "SELECT * from city where state_id = '".$state."'";
                    $ctresult = mysqli_query($conn, $ctquery);
                    if($count>0){ ?>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-8">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1">Name</label>
                                        <input type="text" id="form3Example1" class="form-control"
                                            value="<?php echo $username; ?>" name="username" />

                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" value="<?php echo $email?>"
                                    name="email" />

                            </div>
                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form4Example4">Phone</label>
                                <input type="tel" id="form4Example4" class="form-control" value="<?php echo $contact?>"
                                    name="contact" />

                            </div>
                            <div class="d-flex">
                                <!-- Country Edit -->
                                <div class="d-flex flex-column me-3">
                                    <label class="form-label" for="form4Example5">Country</label>

                                    <select class="form-select me-2" aria-label="Default select example" name="country"
                                        id="country">
                                     
                                        <?php
                                        while($row1 = mysqli_fetch_assoc($cresult)){
                                    ?>

                                        <option value="<?php echo $row1['id'];?>"
                                            name="<?php echo $row1['country_name'];?>"
                                            <?php if($row['country'] == $row1['id']) { echo "selected"; } else{echo "Select Country";}?>>
                                            <?php echo $row1['country_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <!-- State Edit -->
                                <div class="d-flex flex-column me-3">
                                    <label class="form-label" for="form4Example6">State</label>
                                    <select class="form-select me-2" aria-label="Default select example"
                                        name="state_list" id="state">
                                        <?php
                                        while($row2 = mysqli_fetch_assoc($sresult)){
                                    ?>

                                        <option value="<?php echo $row2['id'];?>"
                                            name="<?php echo $row2['state_name'];?>"
                                            <?php if($row['state'] == $row2['id']) { echo "selected"; } else{echo "Select State";}?>>
                                            <?php echo $row2['state_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>


                                <!-- City Edit -->
                                <div class="d-flex flex-column">
                                    <label class="form-label" for="form4Example7">City</label>
                                    <select class="form-select" aria-label="Default select example" name="city_list"
                                        id="city">
                                        <?php
                                                                while($row3 = mysqli_fetch_assoc($ctresult)){
                                                                 
                                                            ?>

                                        <option value="<?php echo $row3['id'];?>"
                                            name="<?php echo $row3['city_name'];?>"
                                            <?php if($row['city'] == $row3['id']) { echo "selected"; } else{echo "Select City";}?>>
                                            <?php echo $row3['city_name'] ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                            </div>

                            <br>
                            <br>
                            <!-- Submit button -->
                            <!-- <input type="submit" name="edit"> -->
                            <input type="submit" class="btn btn-primary btn-block mb-4" name="edit" value="Edit">
                        </div>
                    </div>
                </div>
                <?php }
                    else    {
                        echo "<h1 class='text-center m-5'>User is Not Found</h1>";
                    }
                ?>
            </form>
        </div>
    </div>
</div>