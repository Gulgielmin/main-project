<?php 
require '../app/utils/session_utils.php';

if(!session_started()) {
	header("location: ../account/login.php");
}
else {
	header("location: my_projects.php");
}
?>