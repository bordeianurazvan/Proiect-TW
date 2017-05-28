<?php

/**
 * Created by PhpStorm.
 * User: Valentin Damoc
 * Date: 5/28/2017
 * Time: 1:48 PM
 */
class Functions
{

    public static function getVillageName($user_id)
    {
        $query="SELECT *  from( select village_name from villages where user_id ='$user_id') where rownum < 2 ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        $_SESSION['village_name']=$row[0];
        echo $row[0];
    }
    public static function getIronResources($village_name)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 3 and village_id =( select village_id from villages where village_name like :village_name)";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, ":village_name", $village_name);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        echo $row[0];
    }
    public static function getWoodResources($village_name)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 2 and village_id =( select village_id from villages where village_name like :village_name)";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, ":village_name", $village_name);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        echo $row[0];
    }
    public static function getStoneResources($village_name)
    {
        $query="SELECT resource_number  from villageresources where resource_id = 1 and village_id =( select village_id from villages where village_name like :village_name)";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, ":village_name", $village_name);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        echo $row[0];
    }

}