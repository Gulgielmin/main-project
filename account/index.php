<?php
include '../app/utils/session_utils.php';

$started = session_started();

if($started) {
	header("location: profile.php");
}
else {
	header("location: login.php");
}
?>