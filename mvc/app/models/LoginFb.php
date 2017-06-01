<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 6/1/2017
 * Time: 12:58 PM
 */
class LoginFb
{
  public static function validateId($id)
  {
      $conn=Db::getDbInstance();
      $query="select count(fb_id) from users where fb_id=:id";
          $stid = oci_parse($conn,$query);
      oci_bind_by_name($stid,"id",$id);
      oci_execute($stid);
      $row=oci_fetch_row($stid);
      return $row[0];
  }
    public static function validateName($name)
    {
        $conn=Db::getDbInstance();
        $query="select count(username) from users where username=:name";
        $stid = oci_parse($conn,$query);
        oci_bind_by_name($stid,"name",$name);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];
    }
    public static function getIdByFbId($id)
    {
        $conn=Db::getDbInstance();
        $query="select user_id from users where fb_id=:id";
        $stid = oci_parse($conn,$query);
        oci_bind_by_name($stid,"id",$id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];
    }
}