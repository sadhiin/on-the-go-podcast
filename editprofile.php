<?php
session_start();
$title = "Edit Profile";
if (isset($_SESSION['username'])) {
	include "./includes/header_logeding.php";
} else {
	include "./includes/header.php";
}
?>
<?php
if (isset($_SESSION['username'])) {
} else {
	header("location:login.php");
}
?>
<style type="text/css">
	.center {
		margin: auto;
		width: 60%;
		border: 3px solid #73AD21;
		padding: 10px;
	}

	.red {
		color: red;
	}
</style>



<?php

$name = $email = $username = $gender = $dob = "";
$nameErr = $emailErr = $usernameErr = $genderErr = $dobErr = $message = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


	#----- Name -----#
	if (!isset($_POST['name']) || empty($_POST['name'])) {
		$nameErr = "Name is required";
		$isValid = false;
	} else {
		$name = $_POST['name'];
		if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
			$nameErr = "Only letters, whitespaces, - and ' are acceptable";
			$isValid = false;
		} else if (str_word_count($name) < 2) {
			$nameErr = "Name has to contain at least two words ";
			$isValid = false;
		}
	}

	#----- Email -----#
	if (!isset($_POST['email']) || empty($_POST["email"])) {
		$emailErr = "Email is required";
		$isValid = false;
	} else {
		$email = $_POST["email"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
			$isValid = false;
		}
	}

	#----- User Name -----#
	if (!isset($_POST['username']) || empty($_POST['username'])) {
		$usernameErr = "User Name is required";
		$isValid = false;
	} else {
		$username = $_POST['username'];
		if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
			$usernameErr = "Only letters and white space are allowed";
			$isValid = false;
		} elseif (str_word_count($username) > 1) {
			$usernameErr = "User Name has to contain one word";
			$isValid = false;
		}
	}

	if ($isValid) {
		$data = json_decode(file_get_contents('data.json'), true);

		foreach ($data as $key => $value) {
			if ($value['username'] == $_SESSION['data']['username']) {
				$set = [
					'name'			=> $_POST['name'],
					'email'			=> $_POST['email'],
					'username' 		=> $_SESSION['data']['username'],
					'password' 		=> $_SESSION['data']['password'],

					'profilepicpath' 	=> $_SESSION['data']['profilepicpath']
				];
				$_SESSION['data'] = $set;

				$data[$key] = $_SESSION['data'];
				file_put_contents('data.json', json_encode($data));
				header('Location:viewprofile.php');
			}
		}
	}
}

?>

<div class="container">
	<div class="row gutters">
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div class="account-settings">
						<div class="user-profile">
							<div class="user-avatar">
								<form method="post" action="picupload.php" enctype="multipart/form-data">
									<img src="<?php echo $_SESSION['data']['profilepicpath'] ?>" width="280" height="280" alt="<?php echo $_SESSION['data']['name'] ?>">
									<!-- change profilepicture -->
									<br>
									<input type="file" name="file_to_upload" value="Choose a file"> <br>
									<input type="submit" name="submit">

								</form>
							</div>
							<h5 class="user-name"><?php echo $_SESSION['data']['name'] ?></h5>
							<h6 class="user-email"><?php echo $_SESSION['data']['email'] ?></h6>
						</div>
						<div class="about">
							<h5>About</h5>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur earum, temporibus quam suscipit autem perferendis neque, ea, delectus fugiat dolore et? Quasi itaque maxime magnam dignissimos voluptatum id rem ipsum.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<h6 class="mb-2 text-primary">Personal Details</h6>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="fullName">Full Name</label>
								<input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="name" value="<?= $_SESSION['data']['name'] ?>">
								<span class="red"><?php echo $nameErr ?></span>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="eMail">Email</label>
								<input type="text" class="form-control" id="eMail" name="email" value="<?= $_SESSION['data']['email'] ?>" placeholder="Enter email ID">
								<span class="red"><?php echo $emailErr ?></span>
							</div>
						</div>
					</div>

					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<h6 class="mt-3 mb-2 text-primary">Credential</h6>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" class="form-control" id="pass" placeholder="Current Password">
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="newpass">New Password</label>
								<input type="password" class="form-control" id="newpass" placeholder="New Password">
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="repass">Confirm Password</label>
								<input type="password" class="form-control" id="repass" placeholder="New Password">
							</div>
						</div>
					</div>
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="text-left">
								<br>
								<button type="button" id="submit" name="cancle" value="Cancel" class="btn btn-outline-danger">Cancel</button>
								<button type="button" id="submit" name="submit" value="Update" class="btn btn-outline-primary">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include "./includes/footer.php";
?>