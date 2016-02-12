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
		$orderQuery = "insert into orders values ('','".$_POST['status']."',".$_POST['u_id'].","
			.$_POST['room_no'].",curdate(),curtime(),'');";
		$this->dbConnection->query($orderQuery);
		$products = $_SESSION['products'];
		if ($this->dbConnection->affected_rows > 0) {
			foreach ($products as $pId => $quantity) {
				$detailQuery = "insert into orders_details values (".$pId.",last_insert_id(),"
					.$quantity.",".$quantity."*(select u_price from products where p_id = ".$pId."));";
				$this->dbConnection->query($detailQuery);
			}
		}
		$totalPrice = "update orders set total_price = (select sum(total_price) 
					from orders_details where o_id = last_insert_id());";
		$this->dbConnection->query($totalPrice);
		echo $this->dbConnection->error;
		return $this->dbConnection->affected_rows;
	}	
	function setOrderStatus() {
		$query = "update orders set status='".$_POST['status']."' where o_id=".$_POST['o_id'].";";
		$this->dbConnection->query($query);
		return $this->dbConnection->affected_rows;
	}
	function getOrderDetails() {
		$query = "select products.*, orders_details.* from products,orders_details 
			where products.p_id = orders_details.p_id and orders_details.o_id =".$_POST['o_id'].";";
		$result = $this->dbConnection->query($query);
		return $result;
	}
	function getOrders() {
		$query = "select * from orders";
		$result = $this->dbConnection->query($query);
		return $result;
	}
	function getOrdersByUser() {
		$query = "select * from orders where u_id = ".$_POST['u_id'];
		$result = $this->dbConnection->query($query);
		return $result;	
	}
	function getOrdersByDateRange() {
		$query = "select * from orders where date between date('".$_POST['startDate'].
				"') and date('".$_POST['endDate']."');";
		$result = $this->dbConnection->query($query);
		return $result;		
	}
	function getOrderTotal() {
		$query = "select total_price from orders where o_id = ".$_POST['o_id'];
		$result = $this->dbConnection->query($query);
		return $result;
	}
}
?>