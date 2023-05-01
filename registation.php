<?php
$logofile = "./logo.php";
$title = "SignUp";
include "./includes/header.php";
?>

<script>
    function validateForm() {
        let name = document.getElementById("name")
        let email = document.getElementById("email")
        let username = document.getElementById("username")
        let password = document.getElementById("pass")
        let confirm_password = document.getElementById("repass")
        let phone = document.getElementById("contract")
        let gender = document.getElementById("gender")
        let term = document.getElementById("term").checked;

        // Name validation
        if (name.value == "") {
            alert("Name is required");
            return false;
        }
        if (!/^[a-zA-Z-' ]*$/.test(name)) {
            alert("Only letters and spaces are allowed");
            return false;
        }

        // Email validation
        if (email.value == "") {
            alert("Email is required");
            return false;
        }
        if (!/\S+@\S+\.\S+/.test(email)) {
            alert("Invalid email format");
            return false;
        }

        // Username validation
        if (username.value == "") {
            alert("Username is required");
            return false;
        }
        if (!/^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/.test(username)) {
            alert("Only alphanumeric, spaces, and dashes are allowed");
            return false;
        }

        // Password validation
        if (password.value == "") {
            alert("Password is required");
            return false;
        }
        if (!(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&]).{8,}/.test(password))) {
            alert("Password must be at least 8 characters, contain at least one lowercase letter, one uppercase letter, one number, and one special character");
            return false;
        }

        // Confirm password validation
        if (confirm_password.value == "") {
            alert("Confirm password is required");
            return false;
        }
        if (confirm_password != password) {
            alert("Confirm password does not match password");
            return false;
        }

        // Phone number validation
        if (phone.value == "") {
            alert("Phone number is required");
            return false;
        }
        if (!/^\d{11}$/.test(phone)) {
            alert("Phone number must be 11 digits");
            return false;
        }

        // Gender validation
        if (gender == "") {
            alert("Gender is required");
            return false;
        }

        // Terms and conditions validation
        if (!term) {
            alert("Terms and conditions must be accepted");
            return false;
        }
        return true;
    }
</script>
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
$nameErr = $emailErr = $usernameErr = $passErr = $repasserr = $phoneerr = $genderErr = $termErr = "";

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
    if (!isset($_POST['term'])) {
        $termErr = "Terms & condition should be accepted";
    }
    if (empty($nameErr) and empty($emailErr) and empty($usernameErr) and empty($passErr) and empty($phoneerr) and empty($termErr)) {
        $VALIDINPUT = true;
    }

    if ($VALIDINPUT) {
        $user_data = [
            'name'        =>    $name,
            'username'    =>      $username,
            'email'        =>    $email,
            'password'  =>    $pass,
            'phone'        =>      $phone,
            "profilepicpath" => "upload\/profile.png"
        ];
        include "./controller/adduser.php";

        if (addUser($user_data)) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<h4 class="alert-heading">Well done! ' . $name . '</h4>';
            echo "<p>You have suggessfull sign up</p>";
            echo "</div>";
        } else {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<h4 class="alert-heading">Error..!</h4>';
            echo "<p>Something Went wrong</p>";
            echo '</div>';
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

                                <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" id="name" value="<?php if ($VALIDINPUT == false) {
                                                                                                echo $name;
                                                                                            } ?>" class="form-control" />
                                            <label class="form-label" for="name">Your Full Name</label>
                                            <span class="error">*
                                                <?php echo $nameErr; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" id="username" onkeyup="checkUsername(this.value)" value="<?php if ($VALIDINPUT == false) {
                                                                                                                                            echo $username;
                                                                                                                                        } ?>" class="form-control" />
                                            <label class="form-label" for="username">Username</label>
                                            <span class="error">*
                                                <?php echo $usernameErr; ?>
                                            </span>
                                            <span class="error" id="usernamecheck"></span>
                                            <div id="user-availability-status" class="text-center"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="email" id="email" onblur="chekcEmail(email)" value="
                                            <?php if ($VALIDINPUT == false) {
                                                echo $email;
                                            } ?>" class="form-control" />
                                            <label class="form-label" for="email">Your Email</label>
                                            <span class="error">*
                                                <?php echo $emailErr; ?>
                                            </span>
                                            <span class="error" id="emailAvailable"></span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="phone" name="contract" id="contract" value="<?php if ($VALIDINPUT == false) {
                                                                                                            echo $phone;
                                                                                                        } ?>" class="form-control" placeholder="8801*********" />

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
                                        <input class="form-check-input me-2" type="checkbox" name="term" value="" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="./aboutus.php">Terms of service </a><span class="error">*
                                                <?php echo $termErr; ?>
                                            </span>
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

<script>
    // username avilablity
    function checkUsername(str) {
        if (str.length == 0) {
            document.getElementById("usernamecheck").innerHTML = "";
            return;
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                document.getElementById("usernamecheck").innerHTML = this.responseText;
            }
            xmlhttp.open("GET", "./controller/checkUser.php?query=" + str);

            console.log("request sended for ececking the username");

            xmlhttp.send();
            console.log("Sended");
        }
    }

    function chekcEmail(mailid) {
        const emailInput = document.getElementById('email');
        const email = emailInput.value;
        const regex = /\S+@\S+\.\S+/;
        if (!regex.test(email)) {
            document.getElementById('emailAvailable').innerHTML = 'Please enter a valid email address.'
            emailInput.focus();
        }

        if (email == "") {
            document.getElementById('emailAvailable').innerHTML = "";
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                document.getElementById('emailAvailable').innerHTML = this.responseText;
            }
            xmlhttp.open("GET", "./controller/checkUser.php?email=" + str);

            console.log("request sended for ececking the username");

            xmlhttp.send();
            console.log("Sended");
        }
    }
</script>
<?php
echo "<center>";
echo "<br> <br>";
echo "<br> <br>";
echo "<br> <br>";
echo "<br> <br>";
include "./includes/footer.php";
echo "</center>";
?>