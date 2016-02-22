<?php 
	require_once "DbConnection.php";
    require_once "../models/Orders.php";
    session_start();
    $orderInterface = new Orders(DbConnection::getConnection());
    if (isset($_POST['dest'])) {
    	switch ($_POST['dest']) {
    		case 'cancelOrder':
    			$orderInterface->setOrderStatus('canceled',$_POST['msg']);
    			break;
    		case 'getOrders':
                $ordersRowSet = $orderInterface->getOrders("and status = 'proccessing' order by date,time");
    		    $orders = array();
                while ($order = $ordersRowSet->fetch_assoc()) {
                    array_push($orders, $order);
                }
                echo json_encode($orders);
                break; 
            case 'getOrderDetails':
                $ordersRowSet = $orderInterface->getOrderDetails($_POST['oId']);
                $orders = array();
                while ($order = $ordersRowSet->fetch_assoc()) {
                    array_push($orders,$order);
                }
                echo json_encode($orders);
                break; 
            case 'deliver':
                $orderInterface->setOrderStatus('Out for delivery',$_POST['oId']);
                $dbConnection = DbConnection::getConnection();
                $dbConnection->query("CREATE EVENT updateStatus".$_POST['oId']."
                ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE DO
                UPDATE orders SET status = 'Done' WHERE o_id = ".$_POST['oId'].";");
                break;
            case 'myOrders':
                    $_POST['u_id'] = $_SESSION['u_id'];
                    $ordersRowSet = $orderInterface->getOrdersByUser("order by date,time");
                    $orders = array();
                    while ($order = $ordersRowSet->fetch_assoc()) {
                        array_push($orders, $order);
                    }
                    echo json_encode($orders);
                break;
            case 'search':
                $ordersRowSet = $orderInterface->getOrders("and date between '".$_POST['from'].
                    "' and '".$_POST['to']."' and status != 'canceled' order by date,time");
                $orders = array();
                while ($order = $ordersRowSet->fetch_assoc()) {
                    array_push($orders, $order);
                }
                echo json_encode($orders);
                break;
            case 'addOrder':
                if (isset($_SESSION['u_id']) && $_SESSION['u_id'] != 1) {
                    $_POST['u_id'] = $_SESSION['u_id'];
                }
                $orderInterface->addOrder();
                break;
            case 'getOrdersByUser':
                $ordersRowSet = $orderInterface->getOrdersByUser($_POST['optQ']);
                $orders = array();
                while ($order = $ordersRowSet->fetch_assoc()) {
                    array_push($orders, $order);
                }
                echo json_encode($orders);
                break;
            default:
    			# code...
    			break;
    	}

    }
?>