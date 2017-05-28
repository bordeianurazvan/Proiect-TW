<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/28/2017
 * Time: 2:03 PM
 */
class MapGenerator
{
  public static function getMap()
  {
      $query = "select tip  from map where coord_x=:i and coord_y=:j";
      $conn = Db::getDbInstance();
        $harta ="";
      $harta =$harta.'<table class="tabel-map">';
      for ($i = 1; $i <= 100; $i++){
          $harta=$harta."<tr data-toggle='modal' data-id='1' data-target='#mini-menu'>";

      for ($j = 1; $j <= 100; $j++) {
          $stid = oci_parse($conn, $query);
          oci_bind_by_name($stid, ":i", $i);
          oci_bind_by_name($stid, ":j", $j);
          $r = oci_execute($stid);
          $row= oci_fetch_row($stid);
          $tip = $row[0];
          $harta=$harta.'<td onclick="myFunction(this)"><img alt="Resources" src="/Proiect-TW/mvc/public/images/' . $tip . '.png" title="' . $i . '|' . $j . '"> </td>';

      }
      $harta=$harta.'</tr>';
  }
     $harta=$harta.'</table>';
  return $harta;
  }
}