<?php 
include 'app/utils/session_utils.php';

if (session_started()) {
	header("location: account/profile.php");
}
else {
	header("location: account/login.php");
}
?>