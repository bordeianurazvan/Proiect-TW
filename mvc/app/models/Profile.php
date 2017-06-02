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

    public static function changeUsername($username,$password,$newUsername)
    {
        $password = md5($password);

        $query = "begin functii.changeUsername(:username,:password,:newUsername,:ok); end;";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, ":ok", $ok);
        oci_bind_by_name($statement, ":username", $username);
        oci_bind_by_name($statement, ":password", $password);
        oci_bind_by_name($statement,":newUsername",$newUsername);
        $r = oci_execute($statement);
        if($ok==-1)
        {
            return null;
        }
        else
        {
            //$ok = $newUsername;
            return $ok;
        }

    }

    public static function deleteUserAccount($username,$password)
    {
        $password = md5($password);

        $query = "begin functii.deleteUser(:username,:password,:ok); end;";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, ":ok", $ok);
        oci_bind_by_name($statement, ":username", $username);
        oci_bind_by_name($statement, ":password", $password);
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

    public static function createTicket($userId,$ticketText)
    {
        $query = "begin functii.createTicket(:userId,:ticketText,:ok); end;";
        $statement = oci_parse(Db::getDbInstance(), $query);
        oci_bind_by_name($statement, ":ok", $ok);
        oci_bind_by_name($statement, ":userId", $userId);
        oci_bind_by_name($statement, ":ticketText", $ticketText);
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

    public static function getUserId($username)
    {
        $query = "SELECT user_id from users where username = :username ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':username',$username);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public static function validateUser($username)
    {
        $query = "SELECT count(user_id) from users where username = :username ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':username',$username);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];
    }

    public static function getUsernameByMap($coord_x,$coord_y)
    {
        $query = "SELECT  count(username) from users where user_id in (select user_id from villages where COORD_X=:coord_x and COORD_Y=:coord_y) ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement, ':coord_x', $coord_x);
        oci_bind_by_name($statement, ':coord_y', $coord_y);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        if($row[0]==0)
            return null;
        else {

            $query = "SELECT username from users where user_id in (select user_id from villages where COORD_X=:coord_x and COORD_Y=:coord_y) ";
            $statement = oci_parse(Db::getDbInstance(), $query);
            oci_bind_by_name($statement, ':coord_x', $coord_x);
            oci_bind_by_name($statement, ':coord_y', $coord_y);
            oci_execute($statement);
            $row = oci_fetch_row($statement);
            return $row[0];
        }
    }

    public static function validateFacebookUser($username)
    {
        $query = "SELECT count(fb_id) from users where username = :username and fb_id is not null ";
        $statement = oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($statement,':username',$username);
        oci_execute($statement);
        $row = oci_fetch_row($statement);
        return $row[0];

    }

}