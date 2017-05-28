<?php

/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 28.05.2017
 * Time: 16:50
 */
class Report
{
    public static function checkReport($report_id){
        $query1="SELECT count(*) FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        if(($row=oci_fetch_row($stmt))!=false)
        {
            if ($row[0]==1) {
                return true;
            }
        }
        return false;

    }
    public static function getTitle($report_id){
        $query1="SELECT title FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }

    public static function getMessage($report_id){
        $query1="SELECT message FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }

    public static function getAttackerUID($report_id){
        $query1="SELECT from_user FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getDefenderUID($report_id){
        $query1="SELECT to_user FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getAttackerVID($report_id){
        $query1="SELECT from_village FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getDefenderVID($report_id){
        $query1="SELECT to_village FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getsAttSpearCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[0];
    }
    public static function getsAttAxeCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[1];
    }
    public static function getsAttSwordCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[2];
    }

    public static function getsAttArcherCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        $lista2 =explode("#",$lista[3]);
        return $lista2[0];
    }

    public static function getsAttSpearDeadCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        $lista2 =explode("#",$lista[3]);
        return Report::getsAttSpearCount($report_id)-$lista2[1];
    }
    public static function getsAttAxeDeadCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsAttAxeCount($report_id)-$lista[4];
    }
    public static function getsAttSwordDeadCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsAttSwordCount($report_id)-$lista[5];
    }

    public static function getsAttArcherDeadCount($report_id){
        $query1="SELECT sent_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsAttArcherCount($report_id)-$lista[6];
    }

    public static function getsDefSpearCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[0];
    }
    public static function getsDefAxeCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[1];
    }
    public static function getsDefSwordCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return $lista[2];
    }

    public static function getsDefArcherCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        $lista2 =explode("#",$lista[3]);
        return $lista2[0];
    }

    public static function getsDefSpearDeadCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        $lista2 =explode("#",$lista[3]);
        return Report::getsDefSpearCount($report_id)-$lista2[1];
    }
    public static function getsDefAxeDeadCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsDefAxeCount($report_id)-$lista[4];
    }
    public static function getsDefSwordDeadCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsDefSwordCount($report_id)-$lista[5];
    }

    public static function getsDefArcherDeadCount($report_id){
        $query1="SELECT village_units FROM reports WHERE id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$report_id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        $lista =explode(" ",$row[0]);
        return Report::getsDefArcherCount($report_id)-$lista[6];
    }
    public static function getAttackerUsername($report_id){
        $uid=Report::getAttackerUID($report_id);
        $query1="SELECT username FROM users WHERE user_id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$uid);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];

    }
    public static function getDefenderUsername($report_id){
        $uid=Report::getDefenderUID($report_id);
        $query1="SELECT username FROM users WHERE user_id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$uid);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];

    }
    public static function getAttackerVillageName($report_id){
        $uid=Report::getAttackerVID($report_id);
        $query1="SELECT village_name FROM villages WHERE village_id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$uid);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];

    }

    public static function getDefenderVillageName($report_id){
        $uid=Report::getDefenderVID($report_id);
        $query1="SELECT village_name FROM villages WHERE village_id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$uid);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getReportsCount($user_id){
        $id=$user_id;
        $query1="SELECT count(*) FROM reports WHERE user_id=:id";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$id);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
}