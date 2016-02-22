<?php 
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
// header('retry: 1000');
require_once "DbConnection.php";
require_once "../models/Orders.php";
session_start();
if (!isset($_SESSION['rows'])) {
	$_SESSION['rows'] = 0;
}
var_dump($_SESSION);
$tblRows = $_SESSION['rows'];
$dbConnection = DbConnection::getConnection();
$orderInterface = new Orders($dbConnection);
$dbRowSet = $dbConnection->query("SELECT count(*) as count from orders");
$resultArr = $dbRowSet->fetch_assoc();
// $resultArr = json_encode($resultArr);
// echo "data: {$resultArr}\n\n";
if ($tblRows != 0 && $tblRows < $resultArr['count']) { 
	$_SESSION['rows'] = $resultArr['count'];
	$ordersSet = $orderInterface->getOrders("and status != 'canceled' order by date,time desc limit 1");
	$order = $ordersSet->fetch_assoc();
	$response = array();
	$response['response'] = $order;
	$response = json_encode($response);	
	echo "data: {$response}\n\n";
	ob_end_flush();
	flush();
} else {
	$_SESSION['rows'] = $resultArr['count'];
}
?>