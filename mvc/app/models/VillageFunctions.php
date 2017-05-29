<?php

/**
 * Created by PhpStorm.
 * User: Valentin Damoc
 * Date: 5/28/2017
 * Time: 1:48 PM
 */
class VillageFunctions
{

    public static function getVillageName($user_id)
    {
        $query="SELECT *  from( select village_name from villages where user_id ='$user_id' order by village_id) where rownum < 2 ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        $query1="SELECT *  from( select village_id from villages where user_id ='$user_id' order by village_id) where rownum < 2 ";
        $statement1 = oci_parse(Db::getDbInstance(),$query1);
        oci_execute($statement1);
        $row1 = oci_fetch_row($statement1);
        $_SESSION['village_name']=$row[0];
        $_SESSION['village_id']=$row1[0];
        return $row[0];
    }
    public static function getIronResources($village_id)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 3 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }
    public static function getWoodResources($village_id)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 2 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }
    public static function getStoneResources($village_id)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 1 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public  static function getStorrage($village_id)
    {
        $query = "SELECT building_level FROM  villagebuildings WHERE  building_id = 7 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id",$village_id);
        oci_execute($statement);
        $row =oci_fetch_row($statement);
        return ($row[0]*1000);
    }
}