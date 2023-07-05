<!-- Add Country Data-->

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
                    <form name="addpage" method="post" action="index.php?view=add_country_page"
                        class="has-validation-callback">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">&nbsp;</div>
                                <div class="col-md-8">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr class="danger">
                                                <th colspan="2" class="text-center">Add Country</th>
                                            </tr>
                                            <tr>
                                                <th>Country Name</th>
                                                <td>
                                                    <input type="text" name="country_name" class="form-control">

                                                </td>
                                            </tr>
                                            

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="submit" class="btn btn-success" value="Add"
                                                        name="submit" id="insert">
                                                    <a href="index.php?view=read_country" class="btn btn-danger">Cancel</a>
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