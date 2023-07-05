<?php
include('conn.php');
$query = " select * from user";
$result = mysqli_query($conn, $query);
$country_query = "SELECT * from country";
$country_result = mysqli_query($conn, $country_query);
$state_query = "SELECT * from states";
$state_result = mysqli_query($conn, $state_query);
                                        
ini_set('display_errors','on');

if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];
    $state = $_POST['state_list'];
    $city = $_POST['city_list'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
    $select = "SELECT * FROM user WHERE email = '" . $email . "'";
    $select_res = mysqli_query($conn, $select);
    $count = mysqli_num_rows($select_res);
    // Confirm password validation
    if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirm_password"])) {
        if ($count > 0) {
            $_SESSION["err"] = "Already Exists";
            header('Location: register.php');
            die();
        }
        // Insert Data in Database
        else {
             $sql = "INSERT INTO user(username, email, contact, password, country, state, city) VALUES('" . $username . "','" . $email . "','" . $contact . "','" . $password . "','" . $country . "','" . $state . "','" . $city . "')";
           //exit;
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $_SESSION["msg"] = "Register Suceesfully";
                header('Location:register.php');
                die();
            } else {
                header('Location:register.php?err="Registeration Failed"');
                die();
            }
        }
    }
    else{
        $_SESSION['postdata'] = $_POST;
        $_SESSION["c_passwordErr"] = "Please Enter same as Password!";
        header('Location: register.php');
        die();
    }
}


?>

<?php 

$name = "";
$confirm_password="";
if(isset($_SESSION['postdata'])){

    $postdata = $_SESSION['postdata'];
    $confirm_password = $postdata['confirm_password'];
    unset($_SESSION['postdata']);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Register Page</title>
</head>

<body>
    <section style="background-color: #eee;" class="register-section">
        <div class="container h-100 p-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form class="mx-1 mx-md-4" method="post" id="register-form"
                                        enctype="multipart/form-data">
                                        <!-- PHP Code -->
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
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" id="name" name="username"
                                                    placeholder="Your Name" value="<?php echo $name;?>" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="text" id="email_address" name="email" class="form-control"
                                                    placeholder="Your Email" required />
                                                <span class="email-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-address-book fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="contact_number" name="contact"
                                                    class="form-control" placeholder="Your Contact" pattern="[0-9]{10}"
                                                    required /><br>
                                                <span class="contact-error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw"></i>
                                            <div class="country-select">
                                                <select class="form-select display-6" aria-label="Default select example"
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
                                            </div>
                                            <div class="state-select ms-3">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="state_list" id="state">


                                                    <option value="">Select State</option>

                                                </select>

                                            </div>
                                            <div class="city-select ms-3">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="city_list" id="city">


                                                    <option value="">Select City</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="password_no" name="password" minlength="8"
                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control"
                                                    placeholder="Password"
                                                    title="Must contain at least one number, one uppercase, lowecase letter, at least 8 or more characters"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="c_password" name="confirm_password"
                                                    class="form-control" value="<?php echo $confirm_password;?>"
                                                    placeholder="Confirm your password" required />
                                                <?php if(isset($_SESSION['c_passwordErr'])){?>
                                                <span class="error text-danger">*
                                                    <?php echo $_SESSION["c_passwordErr"]; unset($_SESSION["c_passwordErr"])?></span>
                                                <?php } ?>
                                            </div>
                                        </div>


                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                name="submit">Register</button>
                                            <p class="small fw-bold mt-2 pt-1 mb-0 mx-2">Already Registered? <a
                                                    href="login.php" class="link-danger">Login</a></p>
                                        </div>

                                    </form>

                                </div>


                                <div class="col-md-6  d-flex align-items-center order-1 order-lg-2">
                                    <img src="images/register.jpg" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

    <script src="js/custom.js"></script>
</body>

</html>