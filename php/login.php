<?php

$username = $_POST['username'];
$password = $_POST['password'];
	
    if(strlen($username) ==0){
		echo "Please enter username";
		header("Location: autentificare.html"); /* Redirect browser */
		exit();
	}


$conn = oci_connect("admintw", "ADMINTW", "//localhost/xe");

$query = "begin functii.validareLogin('$username','$password',:ok); end;";
$stid = oci_parse($conn, $query);
oci_bind_by_name($stid, ":ok", $ok);
$r = oci_execute($stid);


	if ($ok==1)
		echo "Autentificare reusita , '$username' ,'$password'";
	else
		echo "USERNAME SAU PAROLA INVALIDA";

oci_close($conn);
?>
