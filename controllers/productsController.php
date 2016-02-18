<?php
	require_once "DbConnection.php";
	session_start();
	$productsInterface = DbConnection::getConnection("localhost","root","iti","cafteria");
	if (isset($_POST['dest'])) {
		switch ($_POST['dest']) {
			case 'getProducts':
				$productsSet = $productsInterface->query('select * from products where status != 0');
				$products = array();
                while ($product = $productsSet->fetch_assoc()) {
                    array_push($products,$product);
                }
                echo json_encode($products);
				break;
			case 'getLatestProducts':
			// need to be dynamic and use dynamic user id 
				$productsSet = $productsInterface->query("SELECT products. * , orders.u_id, orders.date,
					orders.time FROM products, orders, orders_details WHERE orders.o_id = orders_details
					.o_id AND products.p_id = orders_details.p_id AND orders.u_id =3 ORDER BY 
					orders.date DESC LIMIT 3");
				$products = array();
                while ($product = $productsSet->fetch_assoc()) {
                    array_push($products,$product);
                }
                echo json_encode($products);
				break;
			case 'searchProducts':
				$productsSet = $productsInterface->query("select * from products where p_name like '".$_POST['query']."%'");
				$products = array();
                while ($product = $productsSet->fetch_assoc()) {
                    array_push($products,$product);
                }
                echo json_encode($products);
				break;
			case 'getRooms':
				$roomsSet = $productsInterface->query("select * from rooms");
				$rooms = array();
                while ($room = $roomsSet->fetch_assoc()) {
                    array_push($rooms,$room);
                }
                echo json_encode($rooms);
				break;
			default:
				# code...
				break;
		}
	}

?>
