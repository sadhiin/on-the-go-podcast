<?php
    session_start();
    $title = "On-the-Go";
    if (isset($_SESSION['username'])) {
		include "./includes/header_logeding.php";
	} else {
		include "./includes/header.php";
	}
?>

    <h1>on app page</h1>


<?php
    include "./includes/footer.php";

?>