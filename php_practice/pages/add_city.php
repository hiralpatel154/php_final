<?php
$country_query = "SELECT * from country";
$country_result = mysqli_query($conn, $country_query);

?>

<div class="row bg-white row-one">
    <div class="container col-lg-10 free-trip main-content">
        <div class="wrapper mx-5">
            <div class="col-md-12">
                <div class="box box-info">
                    <?php if(isset($_SESSION["msg"])){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION["msg"]; unset($_SESSION["msg"]) ?>
                    </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['err'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["err"]; unset($_SESSION["err"]) ?>
                    </div>
                    <?php } ?>
                    <form name="addpage" method="post" action="index.php?view=add_city_page"
                        class="has-validation-callback">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">&nbsp;</div>
                                <div class="col-md-8">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr class="danger">
                                                <th colspan="2" class="text-center">Add City</th>
                                            </tr>
                                            <tr>
                                                <th>Country Select</th>
                                                <td>

                                                    <select class="form-select" aria-label="Default select example"
                                                        name="country" id="country">


                                                        <option value="">Select Country</option>
                                                        <?php
                                                             while($row = mysqli_fetch_array($country_result)){
                                                        ?>
                                                        <option value="<?php echo $row['id'];?>">
                                                            <?php echo $row['country_name'];?></option>
                                                        <?php
                                                            }?>

                                                    </select>



                                                </td>

                                            </tr>
                                            <tr>
                                                <th>State Select</th>
                                                <td>

                                                    <select class="form-select" aria-label="Default select example"
                                                        name="state" id="state">


                                                        <option value="">Select State</option>

                                                    </select>


                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Add City</th>
                                                <td>
                                                    <input type="text" name="city_name" class="form-control">

                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>

                                                    <!-- <a href="./actions/add_state_page.php" type="button" value="Add" name="submit" id="insert" class="btn btn-success">Add</a> -->
                                                    <input type="submit" class="btn btn-success" value="Add"
                                                        name="submit" id="insert">
                                                    <a href="index.php?view=read_city" class="btn btn-danger">Cancel</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" name="new_state_name" class="form-control new-state me-2" id="new_state_name">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success me-2" value="Add" name="submit_state" id="save_state">Add
                    State</button>
                <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <?php if (isset($_SESSION['state_err'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["state_err"]; unset($_SESSION["state_err"]) ?>
                    </div>
                    <?php } ?>
            <div class="modal-box">
            </div>
        </div>
    </div>
</div>