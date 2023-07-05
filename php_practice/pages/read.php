<?php
$query = "select * from pages";
$result = mysqli_query($conn, $query);
?>


<?php if (isset($_SESSION['err'])) { ?>
<div class="alert alert-danger" role="alert">
    <?php echo $_SESSION["err"]; unset($_SESSION["err"]) ?>
</div>
<?php } ?>
<table class="table align-middle mb-5 bg-white table-bordered text-center">
    <thead class="bg-light">
        <tr>
            <th>ID No</th>
            <th>User Type</th>
            <th>File Type</th>
            <th>File Name</th>
            <th>File Path</th>
            <th>Status</th>
            <th>Action</th>
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
                <?php echo $row['user_type'] ?>
            </td>

            <td>
                <?php echo $row['file_type'] ?>
            </td>
            <td>
                <?php echo $row['file_name'] ?>
            </td>
            <td>
                <?php echo $row['file_path'] ?>
            </td>

            <td>
                <?php
                    if ($row['status'] == "active") {
                        echo '<p><a href="actions/page_status.php?id=' . $row['id'] . '&status=deactive" class="btn btn-success">Active</a></p>';
                    } else {
                        echo '<p><a href="actions/page_status.php?id=' . $row['id'] . '&status=active" class="btn btn-danger">Deactive</a></p>';
                    }
                    ?>
                <!-- <a href="actions/page_status.php?status=active&id=<?php echo $row['id'] ?>" type="button" class="btn btn-light" name="status" value="active">Active</a> -->
                <!-- <a href="actions/page_status.php?status=deactive&id=<?php echo $row['id'] ?>" type="button" class="btn btn-light"  name="status" value="deactive">deactive</a> -->
            </td>
            <td class="action">
                <!-- <form action="index.php?view=update" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form> -->

                <a type="button" class="btn btn-info" href="index.php?view=update&id=<?php echo $row['id'] ?>">Edit</a>

                <a type="button" class="btn btn-danger delete"
                    href="pages/delete.php?id=<?php echo $row['id'] ?>">Delete</a>
            </td>
            
        </tr>
        <?php
            }
            ?>
    </tbody>
</table>