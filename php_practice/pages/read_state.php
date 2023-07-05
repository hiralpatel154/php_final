<h1 class="text-center mt-5">States List</h1>

<?php
    $query = "SELECT c.id as cid,s.id as sid,c.country_name as cname,s.state_name as sname from country c JOIN states s on c.id= s.country_id";
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
            <th>State Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <td>
                <?php echo $row['sid'] ?>
            </td>
            <td>
                <?php echo $row['cname'] ?>
            </td>
            <td>
                <?php echo $row['sname'] ?>
            </td>

            <td class="action">
            <a type="button" class="btn btn-info" href="index.php?view=edit_state&cname=<?php echo $row['cname']?>&cid=<?php echo $row['cid']?>&id=<?php echo $row['sid'] ?>"
                    >Edit</a>

                <a type="button" class="btn btn-danger delete" href="./actions/delete_state.php?id=<?php echo $row['sid'] ?>"
                    >Delete</a>
                <!-- <a type="button" class="btn btn-info"
                    href="index.php?view=edit_country&id=<?php echo $row['id'] ?>">Edit</a>

                <a type="button" class="btn btn-danger delete"
                    href="./actions/delete_country.php?id=<?php echo $row['id'] ?>">Delete</a> -->
            </td>

        </tr>
        <?php
            }
            ?>
    </tbody>
</table>