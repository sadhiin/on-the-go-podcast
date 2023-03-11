<?php
$logofile = "./logo.php";
$title = "SignUp";
include "./includes/header.php";
?>
<style>
    .error {
        color: #FF0000;
    }
</style>

<?php
// validating the input data
function take_input($d)
{
    $d = trim($d);
    $d = stripcslashes($d);
    $d = htmlspecialchars($d);
    return $d;
}
$VALIDINPUT = false;
$name = $email = $username = $pass = $phone = "";
$nameErr = $emailErr = $usernameErr = $passErr = $repasserr = $phoneerr = $genderErr = "";

$canStore = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['register'])) {
    // name vaidation
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        $name = take_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only latters and space is allowed.";
        }
    }
    // Email validation

    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = take_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // user name validaton
    if (empty($_POST["username"])) {
        $usernameErr = "User name required";
    } else {
        $username = $_POST["username"];
        if ((!preg_match("/^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/", $username)) && strlen($username) > 2) {
            $usernameErr = "Only Alpha numaric and space and dash allowed";
        }
    }
    // password validaton
    if (empty($_POST['pass'])) {
        $passErr = "Password should not be empty.";
    } else {
        $pass = $_POST['pass'];

        if (!preg_match("/^(?=.*[A-Za-z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pass)) {
            $passErr = "A-Z, a-Z 0-9 Upper-case Lower-case 8 digit long";
        }
        if (empty(take_input($_POST["repass"]))) {
            $passErr = "Confirm passworkd should not be empty.";
        }
        if ($pass != take_input($_POST["repass"])) {
            $passErr = "Confirm password doesnot match.";
        }
    }
    if (empty($_POST['contract'])) {
        $phoneerr = "Phone number is required.";
    } else {
        //eliminate every char except 0-9
        $justNums = preg_replace("/[^0-9]/", '', $_POST['contract']);

        //eliminate leading 1 if its there
        if (strlen($justNums) > 11)
            $justNums = preg_replace("/^8/", '', $justNums);

        //if we have 10 digits left, it's probably valid.
        if (strlen($justNums) == 11) $isPhoneNum = true;
    }

    if (empty($nameErr) and empty($emailErr) and empty($usernameErr) and empty($passErr) and empty($phoneerr)) {
        $VALIDINPUT = true;
    }
    if ($VALIDINPUT) {
        echo $name . "<br>";
        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">Well done! '.$name. '</h4>';
        echo "<p>You have suggessfull sign up</p>";
        echo "</div>";
    }

    // if ($VALIDINPUT=true) {
    //     $set = [
    //         'name'		=>    $_POST["name"],
    //             'email'		=>    $_POST["email"],
    //             'username'	=>	  $_POST["username"],
    //             'pass'	    =>	  $_POST["pass"],
    //             'phone'		=>	  $_POST["phone"],
    //         'profilepicpath'=> 'profilepic/1.jpg'];

    //     if (!file_exists('data.json')) {
    //         @file_put_contents('data.json', '');
    //     }

    //     $data = json_decode(file_get_contents('data.json'), true);

    //     foreach ($data as $key => $value) {
    //         if ($value['email'] == $_POST['email'] && $value['username'] == $_POST['username']) {
    //             $userExist = "User Already Exist!";
    //             break;
    //         }
    //     }
    //     if (empty($userExist)) {
    //         $data[] = $set;
    //         file_put_contents('data.json', json_encode($data));
    //         header('Location: login.php');
    //     }
    // }

    if ($VALIDINPUT=true) {

        if (file_exists('data.json')) {

            $current_data = file_get_contents('data.json');

            $array_data = json_decode($current_data, true);
            @$new_data = [
                'name'		=>    $_POST["name"],
                'email'		=>    $_POST["email"],
                'username'	=>	  $_POST["username"],
                'pass'	    =>	  $_POST["pass"],
                'phone'		=>	  $_POST["phone"],

            ];
            $array_data[] = $new_data;
            $final_data = json_encode($array_data);

            if (file_put_contents('data.json', $final_data)) {
                $message = "<label class='text-success'>File Appended Successfully</p>";
            }
        } else {
            $error = 'JSON File does not exits';
        }
    }
}
?>


<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control" />
                                            <label class="form-label" for="name">Your Name</label>
                                            <span class="error">*
                                                <?php echo $nameErr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control" />
                                            <label class="form-label" for="username">Username</label>
                                            <span class="error">*
                                                <?php echo $usernameErr; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="email" id="form3Example3c" value="<?php echo $email; ?>" class="form-control" />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <span class="error">*
                                                <?php echo $emailErr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="phone" name="contract" id="contract" value="<?php echo $phone; ?>"class="form-control" placeholder="8801*********" />

                                            <label class="form-label" for="contract">Phone Number</label>
                                            <span class="error">*
                                                <?php echo $phoneerr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="pass" id="form3Example4c" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <span class="error">*
                                                <?php echo $passErr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="repass" id="form3Example4cd" class="form-control" />
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            <span class="error">*
                                                <?php echo $repasserr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="./aboutus.php">Terms of service</a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg">
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="./images/draw1.webp" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








<?php
echo "<center>";
echo "<br> <br>";
echo "<br> <br>";
echo "<br> <br>";
echo "<br> <br>";
include "./includes/footer.php";
echo "</center>";
?>