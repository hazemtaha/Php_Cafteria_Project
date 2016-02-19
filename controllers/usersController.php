<?php 
	require_once "DbConnection.php";
    session_start();
    $usersInterface = DbConnection::getConnection("localhost","root","iti","cafteria");
    if (isset($_POST['dest'])) {
    	switch ($_POST['dest']) {
           case 'getUsers':
                $usersSet = $usersInterface->query("select * from users");
                $users = array();
                while ($user = $usersSet->fetch_assoc()) {
                    array_push($users, $user);
                }
                echo json_encode($users);
               break;
            default:
    			# code...
    			break;
    	}

    }
?>