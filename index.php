<?php 
	session_start();
	if (isset($_COOKIE['login'])) {
		if ($_COOKIE['login'] == 1) {
			$_SESSION[$_COOKIE['login']];
			header("Location: views/AdminMainPage.html");
		} else {
			$_SESSION[$_COOKIE['login']];
			header("Location: views/UserMainPage.html");		
		}
	} else {
			header("Location: views/Login.html");
	}
?>