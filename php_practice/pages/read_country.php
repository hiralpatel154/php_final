<h1 class="text-center mt-5">Country List</h1>

<?php
    $query = "select * from country";
    $result = mysqli_query($conn, $query);
?>
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

<table class="table align-middle mb-5 bg-white table-bordered text-center">
    <thead class="bg-light">
        <tr>
            <th>ID No</th>
            <th>Country Name</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['country_name'] ?>
            </td>




            <td class="action">
                <a type="button" class="btn btn-info"
                    href="index.php?view=edit_country&id=<?php echo $row['id'] ?>">Edit</a>

                <a type="button" class="btn btn-danger delete"
                    href="./actions/delete_country.php?id=<?php echo $row['id'] ?>">Delete</a>
            </td>

        </tr>
        <?php
            }
            ?>
    </tbody>
</table>