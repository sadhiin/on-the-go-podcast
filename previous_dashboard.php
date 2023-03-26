<?php
session_start();
$title = "Dashboard";
if (isset($_SESSION['username'])) {
	include "./includes/header_logeding.php";
} else {
	include "./includes/header.php";
}
?>


<style>
	.center {
		margin: auto;
		width: 60%;
		border: 3px solid #73AD21;
		padding: 10px;
	}
</style>


<?php
if (isset($_SESSION['username'])) {
} else {
	header("location:login.php");
}
?>

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
						<!-- <td class="center" style="width: 1000px; font-size: 30px; text-align: center; vertical-align: text-top;">Welcome to FAITH IT <b><?php echo $_SESSION['username']; ?></b><br><br><img src="<?= $_SESSION['data']['profilepicpath'] ?>" height="155" width="155"></td> -->
					</tr>
				</table>
			</div>
		</form>
	</fieldset>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Account Actions</h5>
				</div>
				<div class="card-body">


					<ul class="list-unstyled ps-0">
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
								Home
							</button>
							<div class="collapse" id="home-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="#" class="link-dark rounded">Overview</a></li>
									<li><a href="#" class="link-dark rounded">Updates</a></li>
									<li><a href="#" class="link-dark rounded">Reports</a></li>
								</ul>
							</div>
						</li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
								Dashboard
							</button>
							<div class="collapse" id="dashboard-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="#" class="link-dark rounded">Overview</a></li>
									<li><a href="#" class="link-dark rounded">Weekly</a></li>
									<li><a href="#" class="link-dark rounded">Monthly</a></li>
									<li><a href="#" class="link-dark rounded">Annually</a></li>
								</ul>
							</div>
						</li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
								Orders
							</button>
							<div class="collapse" id="orders-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="#" class="link-dark rounded">New</a></li>
									<li><a href="#" class="link-dark rounded">Processed</a></li>
									<li><a href="#" class="link-dark rounded">Shipped</a></li>
									<li><a href="#" class="link-dark rounded">Returned</a></li>
								</ul>
							</div>
						</li>
						<li class="border-top my-3"></li>
						<li class="mb-1">
							<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
								Account
							</button>
							<div class="collapse" id="account-collapse" style="">
								<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
									<li><a href="#" class="link-dark rounded">New...</a></li>
									<li><a href="#" class="link-dark rounded">Profile</a></li>
									<li><a href="#" class="link-dark rounded">Settings</a></li>
									<li><a href="#" class="link-dark rounded">Sign out</a></li>
								</ul>
							</div>
						</li>
					</ul>

				</div>
			</div>
		</div>
		<div class="col-md-9">
			<h1>Profile</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod lacinia ante vel ullamcorper. Proin in faucibus velit, ac lacinia enim. Donec eu massa sed risus vulputate efficitur. Suspendisse potenti. Nullam euismod, lectus quis dignissim maximus, erat ex ultrices felis, sit amet ullamcorper elit tortor nec enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer et massa at dolor bibendum interdum. Sed viverra auctor quam, a lacinia augue laoreet ac. Suspendisse potenti.</p>
		</div>
	</div>
</div>

<hr>
<hr>
<hr>

<?php
include "./includes/footer.php";
?>