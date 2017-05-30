<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/30/2017
 * Time: 4:16 PM
 */
class VillageName extends  Controller
{
public function changeVillageName()
    {
    SessionValidate::validateSession();

    if(isset($_POST['name']) && $_POST['name']!=null)
        {
            $conn=Db::getDbInstance();
            $query="update villages set village_name=:name where village_id=:village_id and user_id=:user_id";
            $stid=oci_parse($conn,$query);
            oci_bind_by_name($stid,"name",$_POST['name']);
            oci_bind_by_name($stid,"village_id",$_SESSION['village_id']);
            oci_bind_by_name($stid,"user_id",$_SESSION['user_id']);
            oci_execute($stid);
            $_SESSION['village_name']=$_POST['name'];
        }
        header('Location: /Proiect-tw/mvc/public/village/villageView');
    }
}