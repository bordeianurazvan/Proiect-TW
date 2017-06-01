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
          return ($_SESSION['village_name']);
    }
    public static function getFirstUserVillageName($user_id){
        $query="SELECT *  from( select village_name from villages where user_id ='$user_id' order by village_id) where rownum < 2 ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }
    public static function getFirstUserVillageId($user_id){
        $query1="SELECT *  from( select village_id from villages where user_id ='$user_id' order by village_id) where rownum < 2 ";
        $statement1 = oci_parse(Db::getDbInstance(),$query1);
        oci_execute($statement1);
        $row1 = oci_fetch_row($statement1);
        return $row1[0];
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
    public static function setSessionVillageId($village_id){
        $_SESSION['village_id'] = $village_id;
    }
    public static function setSessionVillageName($village_name){
        $_SESSION['village_name'] = $village_name;
    }
    public static function getVillageNameById($village_id)
    {
        $query="select village_name from villages where village_id = :village_id";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "village_id", $village_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
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
    public static function getNumberOfPages($user_id){
        $user = self::getNumberOfVillages($user_id);
        if($user % 5 > 0)
            return ((int)($user/5)+1);
        else
            return ($user/5);
    }
    public static function getVillagesPage($page,$user_id){
        $from=($page-1)*5+1;
        $to=$page*5;
        $query1="select village_name, row_number 
                from (select village_name, ROWNUM as row_number from
                                        (Select village_name from villages where user_id = :user_id order by village_id))
                where row_number>=:from_pos and row_number<=:to_pos";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":user_id",$user_id);
        oci_bind_by_name($stmt,":from_pos",$from);
        oci_bind_by_name($stmt,":to_pos",$to);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getVillagesIdPage($page,$user_id){
        $from=($page-1)*5+1;
        $to=$page*5;
        $query1="select village_id, row_number 
                from (select village_id, ROWNUM as row_number from
                                        (Select village_id from villages where user_id = :user_id order by village_id))
                where row_number>=:from_pos and row_number<=:to_pos";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":user_id",$user_id);
        oci_bind_by_name($stmt,":from_pos",$from);
        oci_bind_by_name($stmt,":to_pos",$to);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getVillagesCoordsPage($resultList){
        $coordsList = array();
        for($index = 0;$index<count($resultList);$index++)
        {
            $user = self::getVillageCoordX($resultList[$index]);
            array_push($coordsList,$user);
            $user = self::getVillageCoordY($resultList[$index]);
            array_push($coordsList,$user);
        }
        return $coordsList;
    }
    public static function getPointsPage($resultList){
        $pointsList = array();
        for($index = 0;$index<count($resultList);$index++)
        {
            $user = self::getVillagePoints($resultList[$index]);
            array_push($pointsList,$user);
        }
        return $pointsList;
    }
    public static function getResourcesPage($resultList){
        $ResourcesList = array();
        for($index = 0;$index<count($resultList);$index++)
        {
            $iron = self::getIronResources($resultList[$index]);
            array_push($ResourcesList,$iron);
            $wood = self::getWoodResources($resultList[$index]);
            array_push($ResourcesList,$wood);
            $stone = self::getStoneResources($resultList[$index]);
            array_push($ResourcesList,$stone);
            $storage = self::getStorrageLevel($resultList[$index])*1000;
            array_push($ResourcesList,$storage);
        }
        return $ResourcesList;
    }
    public static function getUsername($user_id){
        $query = "select username from users where user_id = :user_id";
        $stmt=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stmt,"user_id",$user_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function victory(){
        $query = "select max(count(village_id)) from villages where user_id > 1 group by user_id";
        $query1 = "select count(*) from villages";
        $stmt=oci_parse(Db::getDbInstance(),$query);
        $stmt1=oci_parse(Db::getDbInstance(),$query1);
        oci_execute($stmt);
        oci_execute($stmt1);
        $row=oci_fetch_row($stmt);
        $row1=oci_fetch_row($stmt1);
        $procentaj = ($row[0] * 100) / $row1[0];
        if($procentaj > 50){
            $query2 = "select username from users where user_id = ( 
                              select user_id from villages having count(user_id) = (
                                       select max(count(village_id)) from villages where user_id > 1 group by user_id) 
                              group by user_id)";
            $stmt2=oci_parse(Db::getDbInstance(),$query2);
            oci_execute($stmt2);
            $row2=oci_fetch_row($stmt2);
            $_SESSION['username'] = $row2[0];
            return true;
        }else {
            return false;
        }
    }
}