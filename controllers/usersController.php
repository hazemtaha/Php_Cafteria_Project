<?php 
	require_once "DbConnection.php";
    session_start();
    $usersInterface = DbConnection::getConnection();
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
            case 'getUsersTotal':
                $usersTotalSet = $usersInterface->query("select users.u_id,users.u_name,sum(orders.total_price) as user_total from users,orders where users.u_id = orders.u_id and orders.status != 'canceled' group by users.u_name order by user_total desc");
                $usersTotal = array();
                while ($userTotal = $usersTotalSet->fetch_assoc()) {
                    array_push($usersTotal, $userTotal);
                }
                echo json_encode($usersTotal);
                break;
            case 'getChecksRange':
                $usersTotalSet = $usersInterface->query("select users.u_id,users.u_name,sum(orders.total_price) as user_total from users,orders where users.u_id = orders.u_id and orders.status != 'canceled' and orders.date between '".$_POST['from']."' and 
                    '".$_POST['to']."' group by users.u_name order by user_total desc");
                $usersTotal = array();
                while ($userTotal = $usersTotalSet->fetch_assoc()) {
                    array_push($usersTotal, $userTotal);
                }
                echo json_encode($usersTotal);
                break;
            case 'getUserInfo':
                $userInfoSet = $usersInterface->query("select * from users where u_id = ".$_SESSION['u_id']);
                $userInfo = $userInfoSet->fetch_assoc();
                echo json_encode($userInfo);
                break;
            case 'forgetPassword':
                $userInfoSet = $usersInterface->query("select * from users where u_email= '".$_POST['email']."';");
                if ($userInfoSet->num_rows == 1) {
                    $userInfo = $userInfoSet->fetch_assoc();
                    $to = $userInfo['u_email'];
                    $subject = "Password recovery";
                    $link = "http://cafeteria-hazemt.rhcloud.com/views/resetPassword.html#".$userInfo['u_id'];
                    $msg = "This Is automatic password recovery message\n Please Click the link below to set a new password\n".$link;
                    // $msg = wordwrap($msg);
                    $mail = mail($to, $subject, $msg);
                    echo "valid";
                } else {
                    echo "invalid";
                } 
                break;
            case 'resetPassword':
                $usersInterface->query("update users set u_password = md5('".$_POST['password']."') where u_id = ".$_POST['u_id'].";");
                break;
            default:
    			# code...
    			break;
    	}

    }
?>