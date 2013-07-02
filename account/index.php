<?php
include '../app/utils/session_utils.php';

if(session_started()) {
	header("location: profile.php");
}
else {
	header("location: login.php");
}
?>