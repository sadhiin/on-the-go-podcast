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

	<?php
	session_start();

	if (isset($_SESSION['username'])) {
	} else {
		header("location:login.php");
	}
	?>

	<div>
		<?php include 'header.php'; ?>
	</div>

	<br>

	<div>
		<fieldset>
			<form method="post" action="picupload.php" enctype="multipart/form-data">
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
									<legend><b>Profile Picture</b></legend>

									<img src="<?= $_SESSION['data']['profilepicpath'] ?>" height="200px" width="200px"> <br>
									<input type="file" name="file_to_upload" value="Choose a file"> <br>
									<hr> <br>
									<input type="submit" name="submit">

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
		<?php include 'footer.php'; ?>
	</div>
</body>

</html>