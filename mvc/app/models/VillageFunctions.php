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
    public static function getVillageNameByCoords($x, $y)
    {
        $query="select village_name from villages where coord_x = $x and coord_y = $y ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        $query1="select village_id from villages where coord_x = $x and coord_y = $y ";
        $statement1 = oci_parse(Db::getDbInstance(),$query1);
        oci_execute($statement1);
        $row1 = oci_fetch_row($statement1);
        $_SESSION['village_name']=$row[0];
        $_SESSION['village_id']=$row1[0];
        return $row[0];
    }
    public static function validateVillage($x, $y , $user_id)
    {
        $query="select user_id from villages where coord_x = $x and coord_y = $y ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        if($row[0] == $user_id)
            return true;
        else return false;
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

    public static function getStorrageLevel($village_id)
    {
        $query = "SELECT building_level FROM  villagebuildings WHERE  building_id = 7 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id",$village_id);
        oci_execute($statement);
        $row =oci_fetch_row($statement);
        return $row[0];
    }
    public static  function  getIronLevel($village_id)
    {
        $query = "SELECT building_level FROM  villagebuildings WHERE  building_id = 6 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static  function  getStoneLevel($village_id)
    {
        $query = "SELECT building_level FROM  villagebuildings WHERE  building_id = 4 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static  function  getWoodLevel($village_id)
    {
        $query = "SELECT building_level FROM  villagebuildings WHERE  building_id = 5 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function  getSpearNumber($village_id)
    {
        $query = "SELECT troop_number FROM  villagetroops WHERE  troop_id = 1 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function  getAxeNumber($village_id)
    {
        $query = "SELECT troop_number FROM  villagetroops WHERE  troop_id = 2 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function  getSwordNumber($village_id)
    {
        $query = "SELECT troop_number FROM  villagetroops WHERE  troop_id = 3 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function  getArcherNumber($village_id)
    {
        $query = "SELECT troop_number FROM  villagetroops WHERE  troop_id = 4 and village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function getNumberOfVillages($user_id)
    {
        $query="SELECT count(*) from villages where user_id ='$user_id'";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function  getVillagePoints($village_id)
    {
        $query = "SELECT points FROM  villages WHERE village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function getVillageCoordX($village_id)
    {
        $query = "SELECT coord_x FROM  villages WHERE village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function getVillageCoordY($village_id)
    {
        $query = "SELECT coord_y FROM  villages WHERE village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return ($row[0]);
    }
    public static function getUserVillagesId($user_id)
    {
        $query = "SELECT village_id FROM  villages WHERE user_id = :user_id order by village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "user_id", $user_id);
        oci_execute($statement);
        $resultList=array();
        while(($row=oci_fetch_row($statement))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getUserVillagesNames($user_id)
    {
        $query = "SELECT village_name FROM  villages WHERE user_id = :user_id order by village_id";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, "user_id", $user_id);
        oci_execute($statement);
        $resultList=array();
        while(($row=oci_fetch_row($statement))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getUserVillagesResources($user_id)
    {
        $villagesResourcesList = array();
        $villagesList = self::getUserVillagesId($user_id);
        for($index=0;$index<count($villagesList);$index++){
            array_push($villagesResourcesList,self::getIronResources($villagesList[$index]));
            array_push($villagesResourcesList,self::getWoodResources($villagesList[$index]));
            array_push($villagesResourcesList,self::getStoneResources($villagesList[$index]));
            array_push($villagesResourcesList,(self::getStorrageLevel($villagesList[$index])*1000));
        }
        return $villagesResourcesList;
    }

    public static function getUserVillagesPoints($user_id)
    {
        $villagesPointsList = array();
        $villagesList = self::getUserVillagesId($user_id);
        for($index=0;$index<count($villagesList);$index++){
            array_push($villagesPointsList,self::getVillagePoints($villagesList[$index]));
        }
        return $villagesPointsList;
    }

    public static function getUserVillagesCoords($user_id)
    {
        $villagesCoordsList = array();
        $villagesList = self::getUserVillagesId($user_id);
        for($index=0;$index<count($villagesList);$index++){
            array_push($villagesCoordsList,self::getVillageCoordX($villagesList[$index]));
            array_push($villagesCoordsList,self::getVillageCoordY($villagesList[$index]));
        }
        return $villagesCoordsList;
    }
}