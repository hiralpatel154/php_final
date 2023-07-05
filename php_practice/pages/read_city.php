<h1 class="text-center mt-5">City List</h1>

<?php
    $query = "SELECT s.id as sid,ct.id as ctid,s.state_name as sname,ct.city_name as ctname, c.country_name as cname from states s INNER JOIN city ct on s.id= ct.state_id INNER JOIN country c on ct.con_id = c.id";
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
            <th>City Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <td>
                <?php echo $row['ctid'] ?>
            </td>
            <td>
                <?php echo $row['cname'] ?>
            </td>
            <td>
                <?php echo $row['sname'] ?>
            </td>
            <td>
                <?php echo $row['ctname'] ?>
            </td>

            <td class="action">
                <a type="button" class="btn btn-info"
                    href="index.php?view=edit_city&id=<?php echo $row['ctid'] ?>">Edit</a>

                <a type="button" class="btn btn-danger delete"
                    href="./actions/delete_city.php?id=<?php echo $row['ctid'] ?>">Delete</a>
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