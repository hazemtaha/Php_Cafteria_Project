<?php 
	require_once "DbConnection.php";
    require_once "../models/Orders.php";
    session_start();
    $orderInterface = new Orders(DbConnection::getConnection("localhost","root","iti","cafteria"));
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
                break;
            case 'myOrders':
                    $ordersRowSet = $orderInterface->getOrders("and status != 'canceled' order by date,time");
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
                $affRows = $orderInterface->addOrder();

                echo $affRows;
                break;
            default:
    			# code...
    			break;
    	}

    }
?>