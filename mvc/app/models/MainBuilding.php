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
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWallLevel($villageId)
    {
        $buildingId = 2;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getBarracksLevel($villageId)
    {
        $buildingId = 3;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStoneLevel($villageId)
    {
        $buildingId = 4;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWoodLevel($villageId)
    {
        $buildingId = 5;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getIronLevel($villageId)
    {
        $buildingId = 6;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStorageLevel($villageId)
    {
        $buildingId = 7;
        $query="SELECT building_level FROM villageBuildings WHERE building_id=:buildingId and village_id=:villageId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getNecessities_iron($villageId,$Building_id)
    {
        $buildingId = $Building_id;
        $query="select building_cost_iron from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getNecessities_wood($villageId,$Building_id)
    {
        $buildingId = $Building_id;
        $query="select building_cost_wood from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getNecessities_stone($villageId,$Building_id)
    {
        $buildingId = $Building_id;
        $query="select building_cost_stone from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }


    public static function getMainBuildingTime($villageId)
    {
        $buildingId = 1;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWallTime($villageId)
    {
        $buildingId = 2;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getBarracksTime($villageId)
    {
        $buildingId = 3;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStoneTime($villageId)
    {
        $buildingId = 4;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getWoodTime($villageId)
    {
        $buildingId = 5;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getIronTime($villageId)
    {
        $buildingId = 6;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getStorageTime($villageId)
    {
        $buildingId = 7;
        $query="select building_time from buildings b join villagebuildings vb on vb.building_id = b.building_id 
                                                      where village_id=:villageId and b.building_id =:buildingId";
        $statement=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];

    }

    public static function getMainBuildingEndTime($villageId)
    {
        $buildingId = 1;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWallEndTime($villageId)
    {
        $buildingId = 2;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getBarracksEndTime($villageId)
    {
        $buildingId = 3;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStoneEndTime($villageId)
    {
        $buildingId = 4;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getWoodEndTime($villageId)
    {
        $buildingId = 5;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getIronEndTime($villageId)
    {
        $buildingId = 6;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function getStorageEndTime($villageId)
    {
        $buildingId = 7;
        $query = "SELECT cast(end_time as timestamp(0)) from build where village_id=:villageId and building_id=:buildingId order by end_time";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":buildingId",$buildingId);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }

    public static function levelUpBuilding($villageId,$buildingId)
    {
        $query = "begin levelUp_building(:villageId,:buildingId,:ok); end;";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_bind_by_name($statement,"buildingId",$buildingId);
        oci_bind_by_name($statement,"ok",$ok);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $ok;
    }

    public static function buildingInConstruction($villageId,$buildingId)
    {
        $query = "select count(id) from build where village_id=:villageId and building_id=:buildingId";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,":villageId",$villageId);
        oci_bind_by_name($statement,"buildingId",$buildingId);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }




}