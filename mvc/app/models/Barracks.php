<?php

/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 29.05.2017
 * Time: 14:25
 */
class Barracks
{
    public static function getSpearCost(){
        $query1="SELECT troop_cost FROM troops WHERE troop_id=1";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getAxeCost(){
        $query1="SELECT troop_cost FROM troops WHERE troop_id=2";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getSwordCost(){
        $query1="SELECT troop_cost FROM troops WHERE troop_id=3";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getArcherCost(){
        $query1="SELECT troop_cost FROM troops WHERE troop_id=4";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_execute($stmt);
        $row=oci_fetch_row($stmt);
        return $row[0];
    }
    public static function getTroopNames($village_id){
        $query1="SELECT troop_id from createtroops where village_id=:id order by end_time";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$village_id);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            if($row[0]==1){
                array_push($resultList,"SpearMan");
            }
            if($row[0]==2){
                array_push($resultList,"AxeMan");
            }
            if($row[0]==3){
                array_push($resultList,"SwordsMan");
            }
            if($row[0]==4){
                array_push($resultList,"Archer");
            }

        }
        return $resultList;
    }

    public static function getTroopsNumber($village_id){
        $query1="SELECT troop_number_tocreate from createtroops where village_id=:id order by end_time";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$village_id);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }

    public static function getTroopsTime($village_id){
        $query1="SELECT cast(end_time as timestamp(0)) from createtroops where village_id=:id order by end_time";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$village_id);
        oci_execute($stmt);
        $resultList=array();
        while(($row=oci_fetch_row($stmt))!=false){
            array_push($resultList,$row[0]);
        }
        return $resultList;
    }

    public static function addTroopsCommand($village,$spear,$axe,$sword,$archer){
        if(!($spear>0)){
            $spear=0;
        }
        if(!($axe>0)){
            $axe=0;
        }
        if(!($sword>0)){
            $sword=0;
        }
        if(!($archer>0)){
            $archer=0;
        }
        $query1="begin barracks_create_troops(:id,:spear,:axe,:sword,:archer,:ok); end;";
        $stmt=oci_parse(Db::getDbInstance(),$query1);
        oci_bind_by_name($stmt,":id",$village);
        oci_bind_by_name($stmt,":spear",$spear);
        oci_bind_by_name($stmt,":axe",$axe);
        oci_bind_by_name($stmt,":sword",$sword);
        oci_bind_by_name($stmt,":archer",$archer);
        oci_bind_by_name($stmt,":ok",$ok);
        oci_execute($stmt);
        return $ok;
    }

}