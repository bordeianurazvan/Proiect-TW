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
      $query = "select *  from map  order by Coord_x,Coord_y";

      $conn = Db::getDbInstance();
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      $harta ="";
      $harta =$harta.'<table class="tabel-map">';
      $contor=1;
      while (($row = oci_fetch_array($stid, OCI_BOTH)) != false)
      {   if($row['COORD_X']==$contor) {
          $harta = $harta . "<tr >";
          $contor++;
      }
          $tip = $row['TIP'];
          if($tip==1)
          $harta=$harta.'<td data-toggle=\'modal\' data-id=\'1\' data-target=\'#mini-menu\' onclick="myFunction(this)"><img alt="Resources" src="/Proiect-TW/mvc/public/images/' . $tip . '.png" title="' . $row['COORD_X'] . '|' . $row['COORD_Y'] . '"> </td>';
          else
              $harta=$harta.'<td onclick="myFunction(this)"><img alt="Resources" src="/Proiect-TW/mvc/public/images/' . $tip . '.png" title="' . $row['COORD_X'] . '|' . $row['COORD_Y'] . ' " id="' . $row['COORD_X'] . '|' . $row['COORD_Y'] . ' " > </td>';
          if($row['COORD_Y']==100)
            $harta=$harta.'</tr>';
  }
     $harta=$harta.'</table>';
  return $harta;
  }
}