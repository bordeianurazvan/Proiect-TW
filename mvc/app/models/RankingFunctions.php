<?php

/**
 * Created by PhpStorm.
 * User: Valentin Damoc
 * Date: 5/29/2017
 * Time: 7:52 PM
 */
class RankingFunctions
{
    public static function getUsersByPoints()
    {
        $query="select username from users order by general_points desc";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $resultList=array();
        while(($row=oci_fetch_row($statement))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getUsersByAttackPoints()
    {
        $query="select username from users order by battle_points desc";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $resultList=array();
        while(($row=oci_fetch_row($statement))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getNumberOfUsers()
    {
        $query="select count(*) from users";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }
    public static function getUserVillagesNumber($username)
    {
        $query="select count(*) from villages where user_id in (select user_id from users where username = :username)";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "username", $username);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }
    public static function getAllUsersVillagesNumber()
    {
        $villages = array();
        $users = self::getUsersByPoints();
        for($index=0;$index<count($users);$index++){
            array_push($villages,self::getUserVillagesNumber($users[$index]));
        }
        return $villages;
    }
    public static function getUsersGeneralPoints($username)
    {
        $query="select general_points from users where username = :username";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "username", $username);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }
    public static function getAllUsersGeneralPoints()
    {
        $points = array();
        $users = self::getUsersByPoints();
        for($index=0;$index<count($users);$index++){
            array_push($points,self::getUsersGeneralPoints($users[$index]));
        }
        return $points;
    }
    public static function getAllUsersVillagesNumberByAttack()
    {
        $villages = array();
        $users = self::getUsersByAttackPoints();
        for($index=0;$index<count($users);$index++){
            array_push($villages,self::getUserVillagesNumber($users[$index]));
        }
        return $villages;
    }
    public static function getUsersAttackPoints($username)
    {
        $query="select battle_points from users where username = :username";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, "username", $username);
        oci_execute($statement);
        $row=oci_fetch_row($statement);
        return $row[0];
    }
    public static function getAllUsersAttackPoints()
    {
        $points = array();
        $users = self::getUsersByAttackPoints();
        for($index=0;$index<count($users);$index++){
            array_push($points,self::getUsersAttackPoints($users[$index]));
        }
        return $points;
    }
    public static function getNumberOfPagesPopulation()
    {
        $user = self::getNumberOfUsers();
        if($user % 5 > 0)
            return ((int)($user/5)+1);
        else
            return ($user/5);
    }
    public static function getUsersPage($page){
        $from=($page-1)*5+1;
        $to=$page*5;
        $query1="select username, row_number 
                from (select username, ROWNUM as row_number from
                                        (SELECT username 
                                        FROM users 
                                        order by general_points desc))
                where row_number>=:from_pos and row_number<=:to_pos";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":from_pos",$from);
        oci_bind_by_name($stmt,":to_pos",$to);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getVillagesPage($resultList){
        $villagesList = array();
        for($index = 0;$index<count($resultList);$index++)
            {
                $user = self::getUserVillagesNumber($resultList[$index]);
                array_push($villagesList,$user);
            }
            return $villagesList;
    }
    public static function getPointsPage($resultList){
        $villagesList = array();
        for($index = 0;$index<count($resultList);$index++)
        {
            $user = self::getUsersGeneralPoints($resultList[$index]);
            array_push($villagesList,$user);
        }
        return $villagesList;
    }
    public static function getUsersPageAttack($page){
        $from=($page-1)*5+1;
        $to=$page*5;
        $query1="select username, row_number 
                from (select username, ROWNUM as row_number from
                                        (SELECT username 
                                        FROM users 
                                        order by battle_points desc))
                where row_number>=:from_pos and row_number<=:to_pos";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":from_pos",$from);
        oci_bind_by_name($stmt,":to_pos",$to);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }
    public static function getAttackPointsPage($resultList){
        $pointsList = array();
        for($index = 0;$index<count($resultList);$index++)
        {
            $user = self::getUsersAttackPoints($resultList[$index]);
            array_push($pointsList,$user);
        }
        return $pointsList;
    }
}