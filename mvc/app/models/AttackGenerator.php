<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/28/2017
 * Time: 10:52 PM
 */
class AttackGenerator
{
   public static function generateAttack($user_id,$x,$y,$spear,$axe,$sword,$archer)
   {

       //echo 'am intrat aici'.$user_id.' '.$x.' '.$y.' '.$spear.' '.$axe.' '.$sword.' '.$archer;
       $query = "select tip  from map where COORD_X=:x and COORD_Y=:y";
       $conn = Db::getDbInstance();
       $stid = oci_parse($conn, $query);
       oci_bind_by_name($stid, ":x", $x);
       oci_bind_by_name($stid, ":y", $y);
       oci_execute($stid);
       $row = oci_fetch_row($stid);
       if($row[0]==0)
          return -1;

       $cod_stare=0;
       $query = "begin atac(:user_id,:x,:y,:spear,:axe,:sword,:archer,:cod_stare);end;";
       $conn = Db::getDbInstance();
       $stid = oci_parse($conn, $query);
       oci_bind_by_name($stid, ":x", $x);
       oci_bind_by_name($stid, ":y", $y);
       oci_bind_by_name($stid, ":user_id", $user_id);
       oci_bind_by_name($stid, ":spear", $spear);
       oci_bind_by_name($stid, ":axe", $axe);
       oci_bind_by_name($stid, ":sword", $sword);
       oci_bind_by_name($stid, ":archer", $archer);
       oci_bind_by_name($stid, ":cod_stare", $cod_stare);
       oci_execute($stid);
       if($cod_stare==-1)
           return -1;
       else
           return 1;




   }
}