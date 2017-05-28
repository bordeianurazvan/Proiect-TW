<?php

/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 16:47
 */
class Profile
{
    public static function getUsername($user_id)
    {
        $query = "SELECT username from users where user_id = :user_id ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':user_id',$user_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public static function getSignUpDate($user_id)
    {
        $query = "SELECT data_inregistrare from users where user_id = :user_id ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':user_id',$user_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public static function getNumberOfVillages($user_id)
    {
        $query = "SELECT count(*) from villages v join users u on u.user_id = v.user_id where u.user_id = :user_id ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':user_id',$user_id);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public static function  getUserAge($user_id)
    {
        $query = " begin functii.varsta(:user_id,:varsta); end; ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, ":user_id", $user_id);
        oci_bind_by_name($statement,":varsta", $varsta);
        oci_execute($statement);
        return $varsta;
    }

    public static function changeUserPassword($username,$oldPassword,$newPassword)
    {
        $oldPassword = md5($oldPassword);
        $newPassword = md5($newPassword);

        $query = "begin functii.changePassword(:username,:oldPassword,:newPassword,:ok); end;";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, ":ok", $ok);
        oci_bind_by_name($statement, ":username", $username);
        oci_bind_by_name($statement, ":oldPassword", $oldPassword);
        oci_bind_by_name($statement,":newPassword",$newPassword);
        $r = oci_execute($statement);
        if($ok==-1)
        {
            return null;
        }
        else
        {

            return $ok;

        }

    }

}