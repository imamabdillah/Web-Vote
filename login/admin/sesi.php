<?php
if (empty($_SESSION['idskasis']) and empty($_SESSION['userskasis'])) {
	header('location:login.php');
}
