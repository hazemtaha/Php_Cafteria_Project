<?php 
	require_once "controllers/DbConnection.php";
	require_once "models/Orders.php";
	session_start();
	$pr = array(1 => 1 , 2 => 4 , 3 => 3 , 4 => 1);
	$_SESSION['products'] = $pr;
	$order = new Orders(DbConnection::getConnection("localhost","root","iti","cafteria"));
	$order->addOrder();
	// var_dump($result->fetch_assoc()); 
/*	while ($row = $result->fetch_assoc()) {
		foreach ($row as $key => $value) {
			echo "<pre>".$key." + ".$value."</pre>";
		}
	}*/
?>