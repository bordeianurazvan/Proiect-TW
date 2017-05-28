<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/27/2017
 * Time: 10:46 AM
 */
class User
{
 public  $user_id;


  public static function login($username,$password)
  {
     $password = md5($password);
      $conn = Db::getDbInstance();

      $query = "begin functii.validareLogin(:username,:password,:ok); end;";
      $stid = oci_parse($conn, $query);
      oci_bind_by_name($stid, ":ok", $ok);
      oci_bind_by_name($stid, ":username", $username);
      oci_bind_by_name($stid, ":password", $password);
      $r = oci_execute($stid);
      if($ok==-1)
      {
          return null;
      }
      else
      {
          $user = new User();
          $user->user_id=$ok;
          return $user;


      }

  }
  public static function register ($username,$password,$c_password,$bday)
  {
      if($password!=$c_password) {

          return null;
      }
      $conn =Db::getDbInstance();
      $password = md5($password);
      $bday = date('d-m-Y h:i:s', strtotime($bday));

      $query = "begin functii.inregistrare(:username,:password,to_date(:bday,'dd-mm-yy hh24:mi:ss') ,:ok); end;";

      $stid = oci_parse($conn, $query);
      oci_bind_by_name($stid, ":username", $username);
      oci_bind_by_name($stid, ":password", $password);
      oci_bind_by_name($stid, ":bday", $bday);
      oci_bind_by_name($stid, ":ok", $ok);
      $r = oci_execute($stid);

      if($ok==-1) {

          return null;
      }
      else
      {

          $user = new User();
          $user->user_id = $ok;

          return $user;



      }
  }

}