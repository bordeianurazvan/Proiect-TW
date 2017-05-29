<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/29/2017
 * Time: 4:04 PM
 */
class TroopsMovements
{
    public static function getPages($village_id)
    {
        $page_numbers = TroopsMovements::getCommandsNumber($village_id);
        if($page_numbers<3)
            return 1;
        if($page_numbers%3!=0)
            $page_numbers =$page_numbers/3 +1;
        else
            $page_numbers=$page_numbers/3;
        return $page_numbers;
    }
    public static function generateCommands($page_number)
    {
        $village_id=$_SESSION['village_id'];
        $commands_table="";

           $from_position=($page_number-1)*3+1;
           $to_pos = $page_number*3;
           $max_page_number = TroopsMovements::getPages($_SESSION['village_id']);

           $loop_time=3;

           if($max_page_number == $page_number) {
               $loop_time = TroopsMovements::getCommandsNumber($_SESSION['village_id']);
               $loop_time = $loop_time %3;
               if($loop_time==1)
                   $loop_time=1;
               elseif ($loop_time==2)
                   $loop_time=2;
               elseif ($loop_time==0)
                   $loop_time=3;
           }
        $query="select id,from_village,to_village,units,command_type, row_number
                from (select id,from_village,to_village,units,command_type, ROWNUM as row_number from
                                        (SELECT id,from_village,to_village,units,command_type 
                                        FROM commands 
                                        WHERE to_village=:id or from_village=:id
                                        order by id desc))
                where row_number>=:from_pos and row_number<=:to_pos";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,":id",$village_id);
        oci_bind_by_name($stid,":from_pos",$from_position);
        oci_bind_by_name($stid,":to_pos",$to_pos);
        oci_execute($stid);
        for($i=0;$i<$loop_time;$i++)
        {
            $row=oci_fetch_row($stid);

           if($row[4]=='defense'&& $row[2]==$village_id)  {
               $commands_table=$commands_table.' <div class="row"><div class="col-md-1"></div><div class="col-md-10 Table"><table class="table table-condensed"><thead><tr>';
               $commands_table = $commands_table . '<th class="col-md-4 col-xs-4 col-sm-2 col-lg-4">Reinforcements</th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_axe.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_spear.png" class="img-responsive"></th>'
                   . ' </tr></thead><tbody><tr> <td>Troops</td>' . '<td>' . TroopsMovements::getSword($row[0]) . '</td>' . '<td>' . TroopsMovements::getAxe($row[0]) . '</td>' . '<td>' . TroopsMovements::getArcher($row[0]) . '</td>' . '<td>' . TroopsMovements::getSpear($row[0]) . '</td></tr>'
                   . '<tr><td>Arrival</td>' . '<td colspan="4">' . TroopsMovements::getArriveTime($row[0]) . '</td>' . '</tr></tbody></table> </div><div class="col-md-1"></div></div>';
           }
           elseif ($row[4]=='attack' && $row[1]==$village_id)
           {
               $commands_table=$commands_table.' <div class="row"><div class="col-md-1"></div><div class="col-md-10 Table"><table class="table table-condensed"><thead><tr>';
               $commands_table = $commands_table . '<th class="col-md-4 col-xs-4 col-sm-2 col-lg-4">Attack to '.TroopsMovements::getXToVillage($row[2]).'|'.TroopsMovements::getYToVillage($row[2]). '</th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_axe.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_spear.png" class="img-responsive"></th>'
                   . ' </tr></thead><tbody><tr> <td>Troops</td>' . '<td>' . TroopsMovements::getSword($row[0]) . '</td>' . '<td>' . TroopsMovements::getAxe($row[0]) . '</td>' . '<td>' . TroopsMovements::getArcher($row[0]) . '</td>' . '<td>' . TroopsMovements::getSpear($row[0]) . '</td></tr>'
                   . '<tr><td>Arrival</td>' . '<td colspan="4">' . TroopsMovements::getArriveTime($row[0]) . '</td>' . '</tr></tbody></table> </div><div class="col-md-1"></div></div>';
           }
           elseif ($row[4]=='attack' && $row[2]==$village_id)
           {
               $commands_table=$commands_table.' <div class="row"><div class="col-md-1"></div><div class="col-md-10 Table"><table class="table table-condensed"><thead><tr>';
               $commands_table = $commands_table . '<th class="col-md-4 col-xs-4 col-sm-2 col-lg-4">Attack from '.TroopsMovements::getXFromVillage($row[1]).'|'.TroopsMovements::getYFromVillage($row[1]). '</th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_sword.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_axe.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_archer.png" class="img-responsive"></th>
                    <th class="col-md-2 col-xs-2 col-sm-2 col-lg-2"><img alt="Sword" src="/Proiect-TW/mvc/public/images/unit_spear.png" class="img-responsive"></th>'
                   . ' </tr></thead><tbody><tr> <td>Troops</td>' . '<td>' .'?' . '</td>' . '<td>' . '?' . '</td>' . '<td>' . '?' . '</td>' . '<td>' . '?' . '</td></tr>'
                   . '<tr><td>Arrival</td>' . '<td colspan="4">' . TroopsMovements::getArriveTime($row[0]) . '</td>' . '</tr></tbody></table> </div><div class="col-md-1"></div></div>';
           }

        }
        return $commands_table;
    }
    public static function getCommandsNumber($village_id)
    {
        $query="select count(*) from commands where from_village=:village_id or to_village=:village_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"village_id",$village_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
  public static function getToVillage($command_id)
  {
          $query="Select to_village from commands where id=:command_id";
          $stid=oci_parse(Db::getDbInstance(),$query);
          oci_bind_by_name($stid,"command_id",$command_id);
          oci_execute($stid);
          $row=oci_fetch_row($stid);
          return $row[0];

  }
    public static function getXToVillage($village_id)
    {
        $query="Select coord_x from villages where village_id=:village_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"village_id",$village_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getYToVillage($village_id)
    {
        $query="Select coord_y from villages where village_id=:village_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"village_id",$village_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getXFromVillage($village_id)
    {
        $query="Select coord_x from villages where village_id=:village_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"village_id",$village_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getYFromVillage($village_id)
    {
        $query="Select coord_y from villages where village_id=:village_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"village_id",$village_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getSpear($command_id)
{
    $query="Select to_number(substr( units, 1, instr(units,' ',1,1)-1  )  ) from commands where id=:command_id";
    $stid=oci_parse(Db::getDbInstance(),$query);
    oci_bind_by_name($stid,"command_id",$command_id);
    oci_execute($stid);
    $row=oci_fetch_row($stid);
    return $row[0];

}
    public static function getAxe($command_id)
{
    $query="Select to_number( substr  (units, instr(units,' ',1,1)+1  ,instr(units,' ',1,2)-1-instr(units,' ',1,1) ) ) from commands where id=:command_id";
    $stid=oci_parse(Db::getDbInstance(),$query);
    oci_bind_by_name($stid,"command_id",$command_id);
    oci_execute($stid);
    $row=oci_fetch_row($stid);
    return $row[0];

}
    public static function getSword($command_id)
    {
        $query="Select to_number(substr(units,instr(units,' ',1,2)+1,instr(units,' ',1,3)-1 - instr(units,' ',1,2))) from commands where id=:command_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"command_id",$command_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getArcher($command_id)
    {
        $query="Select to_number(substr(units,instr(units,' ',1,3)+1,length(units)))from commands where id=:command_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"command_id",$command_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getAttackType($command_id)
    {
        $query="Select command_type from commands where id=:command_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"command_id",$command_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }
    public static function getArriveTime($command_id)
    {
        $query="Select cast(arrive_time as timestamp(0)) type from commands where id=:command_id";
        $stid=oci_parse(Db::getDbInstance(),$query);
        oci_bind_by_name($stid,"command_id",$command_id);
        oci_execute($stid);
        $row=oci_fetch_row($stid);
        return $row[0];

    }

}