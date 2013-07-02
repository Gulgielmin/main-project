<?php 

function session_started() {
	return (isset($_SESSION['idUsuario']) && isset($_SESSION['emailUsuario']));
}
?>