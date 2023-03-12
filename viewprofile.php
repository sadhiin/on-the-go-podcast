<?php
$title = "View Profile";
include "./includes/header.php";
?>

<style>
	.center {
		margin: auto;
		width: 60%;
		border: 3px solid #73AD21;
		padding: 10px;
	}
</style>

<div>
	<fieldset>
		<form>
			<div>
				<table>
					<tr>
						<td style="width:300px;">
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
							<fieldset style="width:600px;">
								<legend>
									<h2>Profile</h2>
								</legend>
								<table>
									<?php
									session_start();

									if (isset($_SESSION['username'])) {
									} else {
										header("location:login.php");
									}
									?>

									<tr>
										<td width="25%">Name</td>
										<td><span>:</span><?= $_SESSION['data']['name'] ?></td>
										<td rowspan="3" width="100%" align="center"><img src="<?= $_SESSION['data']['profilepicpath'] ?>" height="100" width="100"></td>
									</tr>

									<tr>
										<td width="25%">Email</td>
										<td><span>:</span><?= $_SESSION['data']['email'] ?></td>
									</tr>

									<tr>
										<td width="25%">Gender</td>
										<td><span>:</span><?= $_SESSION['data']['gender'] ?></td>
									</tr>

									<tr>
										<td width="25%">Date of Birth</td>
										<td><span>:</span><?= $_SESSION['data']['dob'] ?></td>
										<td align="center"><a href="changeprofilepicture.php">Change</a></td>
									</tr>


								</table> <br>
								<hr>
								<a href="editprofile.php">Edit Profile</a>
							</fieldset>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</fieldset>
</div>

<br>

<?php
include "./includes/footer.php";
?>