<?php

/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 29.05.2017
 * Time: 14:25
 */
class MainBuilding
{
    public static function getMainBuildingLevel($villageId)
    {
        $buildingId = 1;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWallLevel($villageId)
    {
        $buildingId = 2;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getBarracksLevel($villageId)
    {
        $buildingId = 3;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStoneLevel($villageId)
    {
        $buildingId = 4;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWoodLevel($villageId)
    {
        $buildingId = 5;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getIronLevel($villageId)
    {
        $buildingId = 6;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStorageLevel($villageId)
    {
        $buildingId = 7;
        $query1="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getMainBuildingNecessities($villageId)
    {
        $buildingId = 1;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWallNecessities($villageId)
    {
        $buildingId = 2;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getBarracksNecessities($villageId)
    {
        $buildingId = 3;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStoneNecessities($villageId)
    {
        $buildingId = 4;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWoodNecessities($villageId)
    {
        $buildingId = 5;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getIronNecessities($villageId)
    {
        $buildingId = 6;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStorageNecessities($villageId)
    {
        $buildingId = 7;
        $query1="select building_cost from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getMainBuildingTime($villageId)
    {
        $buildingId = 1;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWallTime($villageId)
    {
        $buildingId = 2;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getBarracksTime($villageId)
    {
        $buildingId = 3;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStoneTime($villageId)
    {
        $buildingId = 4;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWoodTime($villageId)
    {
        $buildingId = 5;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getIronTime($villageId)
    {
        $buildingId = 6;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStorageTime($villageId)
    {
        $buildingId = 7;
        $query1="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

}