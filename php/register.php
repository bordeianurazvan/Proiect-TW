
<?php
session_start();
$conn = oci_connect("admintw", "ADMINTW", "//localhost/xe");
$ip = $_SERVER['REMOTE_ADDR'];

	if(isset($_POST['user_name']) and isset($_POST['password'])and isset($_POST['bday'])){ 
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$bday = date('d-m-Y h:i:s', strtotime($_POST['bday']));  
		
		$query = "begin functii.inregistrare(:username,:password,to_date(:bday,'dd-mm-yy hh24:mi:ss') ,:ip,:ok); end;";
		
		$stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ":username", $user_name);
		oci_bind_by_name($stid, ":password", $password);
		oci_bind_by_name($stid, ":bday", $bday);
		oci_bind_by_name($stid, ":ip", $ip);
		oci_bind_by_name($stid, ":ok", $ok);
		$r = oci_execute($stid);

		if($ok==0) {
            header('Location: ../register.html');
            die();
        }
		else
        {

           $_session['username']=$user_name;
            header('Location : ../Compass.html');
           exit();


     
     }
   
	}
oci_close($conn);

?>