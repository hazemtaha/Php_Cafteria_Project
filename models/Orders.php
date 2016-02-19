<?php 
/**
* 
*/
class Orders
{
	private $dbConnection;
	function __construct(mysqli $dbCon) {
		$this->dbConnection = $dbCon;
	}
	function addOrder() {
		$orderQuery = "insert into orders values ('',default(status),".$_POST['u_id'].",".$_POST['room_no'].",curdate(),curtime(),".$_POST['totalPrice'].",'".$_POST['notes']."');";
		$this->dbConnection->query($orderQuery);
		$products = json_decode($_POST['products'],true);
		if ($this->dbConnection->affected_rows > 0) {
			for ($i=0; $i < count($products); $i++) { 
				$val = true;
				$detailQuery = "insert into orders_details values (".$products[$i]['productId'].",last_insert_id(),"
					.$products[$i]['quantity'].",".$products[$i]['total'].");";
				$this->dbConnection->query($detailQuery);
			}
		}
		// $totalPrice = "update orders set total_price = (select sum(total_price) 
		// 			from orders_details where o_id = last_insert_id());";
		// $this->dbConnection->query($totalPrice);
		// echo $this->dbConnection->error;
		return $this->dbConnection->affected_rows;
	}	
	function setOrderStatus($status,$oId) {
		$query = "update orders set status='".$status."' where o_id=".$oId.";";
		$this->dbConnection->query($query);
		return $this->dbConnection->affected_rows;
	}
	function getOrderDetails($oId) {
		$query = "select products.*, orders_details.* from products,orders_details 
			where products.p_id = orders_details.p_id and orders_details.o_id =".$oId.";";
		$result = $this->dbConnection->query($query);
		return $result;
	}
	function getOrders($optQString) {
		if (!isset($optQString)) {
			$optQString = "";
		}
		$query = "select orders.*,users.u_name,users.ext from orders,users where orders.u_id = users.u_id ".$optQString;
		$result = $this->dbConnection->query($query);
		return $result;
	}
	function getOrdersByUser($optQString) {
		if (!isset($optQString)) {
			$optQString = "";
		}
		$query = "select * from orders where u_id = ".$_POST['u_id']." and status != 'canceled' ".$optQString.";";
		$result = $this->dbConnection->query($query);
		return $result;	
	}
	function getOrdersByDateRange() {
		$query = "select * from orders where date between date('".$_GET['from'].
				"') and date('".$_GET['to']."');";
		$result = $this->dbConnection->query($query);
		return $result;		
	}
	function getOrderTotal() {
		$query = "select total_price from orders where o_id = ".$_POST['o_id'];
		$result = $this->dbConnection->query($query);
		return $result;
	}
	function getOrder($oId) {
		$query = "select * from orders where o_id =".$oId;
		$result = $this->dbConnection->query($query);	
		return $result->fetch_assoc();	
	}
}
?>