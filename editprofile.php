<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<style>
		.center {
			margin: auto;
			width: 60%;
			border: 3px solid #73AD21;
			padding: 10px;
		}
	</style>
</head>

<body>

	<style type="text/css">
		.red {
			color: red;
		}
	</style>

	<?php
	session_start();

	if (isset($_SESSION['username'])) {
	} else {
		header("location:login.php");
	}
	?>

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

		#----- Gender -----#
		if (!isset($_POST['gender']) || empty($_POST['gender'])) {
			$genderErr = "Gender is required";
			$isValid = false;
		} else {
			$gender = $_POST['gender'];
		}

		#----- Date of Birth -----#
		if (!isset($_POST['dob']) || empty($_POST['dob'])) {
			$dobErr = "Date of Birth is required";
			$isValid = false;
		} else {
			$dob = $_POST['dob'];
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
						'gender' 			=> $_POST['gender'],
						'dob' 			=> $_POST['dob'],
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


	<div>
		<?php include 'header.php'; ?>
	</div>

	<br>

	<div>
		<fieldset>
			<form>
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
								<label><b>Account</b></label>
								<hr> <br>
								<ul>
									<li><a href="dashboard.php">Dashboard</a></li>
									<li><a href="viewprofile.php">View Profile</a></li>
									<li><a href="editprofile.php">Edit Profile</a></li>
									<li><a href="changeprofilepicture.php">Change Profile Picture</a></li>
									<li><a href="changepassword.php">Change Password</a></li>
									<li><a href="Logout.php">Logout</a></li>
								</ul>
							</td>

							<td class="center">
								<fieldset>
									<legend>
										<h2>Edit Profile</h2>
									</legend>
									<table>
										<tr>
											<td>Name</td>
											<td>:</td>
											<td><input type="text" name="name" value="<?= $_SESSION['data']['name'] ?>"><span style="red">*<?php echo $nameErr ?></span></td>
										</tr>

										<tr>
											<td>Email</td>
											<td>:</td>
											<td><input type="text" name="email" value="<?= $_SESSION['data']['email'] ?>"><span style="red">*<?php echo $emailErr ?></span></td>
										</tr>

										<tr>
											<td>Gender</td>
											<td>:</td>
											<td>
												<input <?php if ($_SESSION['data']['gender'] == 'male') {
															echo 'checked="checked"';
														} ?> type="radio" name="gender" value="male" id="male"> <label for="male">Male</label>
												<input <?php if ($_SESSION['data']['gender'] == 'female') {
															echo 'checked="checked"';
														} ?> type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
												<input <?php if ($_SESSION['data']['gender'] == 'other') {
															echo 'checked="checked"';
														} ?> type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
											</td>
										</tr>

										<tr>
											<td>Date of Birth</td>
											<td>:</td>
											<td><input type="date" name="dob" value="<?= $_SESSION['data']['dob'] ?>"><span style="red">*<?php echo $dobErr ?></span></td>
										</tr>

									</table>
									<input type="submit" name="submit" value="Submit">
								</fieldset>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div>
		<?php
		include 'footer.php';
		?>
	</div>
</body>

</html>