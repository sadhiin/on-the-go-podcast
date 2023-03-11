<?php

$logofile = "./logo.php";
$title = "On-the-Go Home";
include "./includes/header.php";
?>
<!-- login validation -->
<style>
    .error {
        color: #FF0000;
    }
</style>

<?php
// name="remeber" checkbox name
function take_input($d)
{
    $d = trim($d);
    $d = stripcslashes($d);
    $d = htmlspecialchars($d);
    return $d;
}
$username = $usernameErr = $emailadd = $emailErr = $pass = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['login'])) {
    if (empty($_REQUEST["username"])) {
        $usernameErr = "Username or email required";
    } else {
        $username = take_input($_REQUEST["username"]);
        $emailadd = take_input($_REQUEST['username']);

        // no need to validathe username also
        // if ((!preg_match("/^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/", $username)) && strlen($username) > 2) {
        //     $usernameErr = "Only Alpha numaric and space and dash allowed";
        // }
    }

    // password validaton
    if (empty($_REQUEST['pass'])) {
        $passErr = "Password can not be empty.";
    } else {
        $pass = $_REQUEST['pass'];

        // no need to validate passworrd here.
        // if (!preg_match("/^(?=.*[A-Za-z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pass)) {
        //     $passErr = "Passwoed must contain spacial carecter [@,!,#,$,%]";
        // }
    }
    // echo "username: ".$_REQUEST['user']."<br> password: ".$_REQUEST["pass"]."<br> remeber: ".$_REQUEST['remember'];
    // have to run the sql query for the vefiying the user information

    // $query = "
    //     SET @username = :username
    //     SELECT * FROM user_db
    //     WHERE ( username = @username OR email = @username)
    //     AND password = :password
    // ";

    // $statement = $pdoObject->prepare($query);
    // $statement->bindValue(":username", $login, PDO::PARAM_STR);
    // $statement->bindValue(":password", $password, PDO::PARAM_STR);
    // $statement->execute();
}

?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <!-- Email input -->
                    <div class="form-floating mb-3">
                        <input type="text" name="user" class="form-control" id="floatingInput" placeholder="Password">
                        <label for="floatingInput">Username or Email</label>
                        <span class="error">*
                            <?php echo $usernameErr; ?>
                        </span>
                    </div>

                    <!-- Password input -->
                    <div class="form-floating">
                        <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <span class="error">*
                            <?php echo $passErr; ?>
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" checked="checked" name="remember" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>

                        </div>
                        <a href="./forgetpassword.php" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="login" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./registation.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Footer of the page -->
<?php
echo "<center>";
include "./includes/footer.php";
echo "</center>";
?>