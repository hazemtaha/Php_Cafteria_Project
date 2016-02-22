<?php


class user
{
	private $dbConnection;
	function __construct(mysqli $dbCon)
    {
        $this->dbConnection = $dbCon;
    }

       //===========================Add user==============================

    function Add_user(){
    $roomQuery = "Insert into rooms values(".$_POST['u_room'].")";	
	$this->dbConnection->query($roomQuery);
	$sql = "INSERT INTO users (u_name,u_email,u_password,room_no,ext,u_img) VALUES ( '".$_POST["u_name"]."', '".$_POST["u_email"]."', md5('".$_POST["u_pass"]."'),
	".$_POST["u_room"].", '".$_POST ["ext"]."', '".$_FILES['pic']['name']."')";

	if ($this->dbConnection->query($sql) === TRUE) {
		echo "done";
        } else {
            echo "Error: " . $sql . "<br>" . $this->dbConnection->error;
        }

	}   
    	//============================Delete user===========================
	public function  delete_user($val){

    $sql = "DELETE FROM users WHERE u_id='".$val."'";
    if ( $this->dbConnection->query($sql) === TRUE) {
        echo " successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $this->dbConnection->query($sql)->error;
    }}

	//=========================Get users================================
	function dispaly_users(){

		$sql = "select * from users";

		$result = $this->dbConnection->query($sql);

		return $result;
	}     
		
	//============================update user===============================
	public function edit_user ($val,$val1,$val2,$val3,$val4)
	{
	$sql = "UPDATE users SET u_name='".$val1."',room_no='".$val2."', ext='".$val3."' , u_img='".$val4."' WHERE u_id='".$val."' ";
	$this->dbConnection->query($sql);
   	}
   	//=============================Search user==============================
   	public  function search_user($value){
        $sql = "SELECT * FROM users where u_id='".$value."' ";
        $result=$this->dbConnection->query($sql);
        return $result;
  }

	//============================Login===============================
	     public function Login($value1,$value2){

                $sql = "SELECT * FROM users WHERE u_email= '".$value1."' AND u_password = '".$value2."'";  
				$res = $this->dbConnection->query($sql);	
				return $res;
				






	     }


    }

?>


