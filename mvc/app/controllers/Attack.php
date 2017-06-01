<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:55
 */
class Attack extends Controller
{
    public function getAttack($status = ' ', $retry = ' ',$x='',$y='')
    {
        SessionValidate::validateSession();
        if($x!=null && $y!=null) {
            $_SESSION['x'] = $x;
            $_SESSION['y'] = $y;
        }


        if ($status == 'failed' && $retry = 'yes') {
            header('Location: /Proiect-TW/mvc/public/attack/getattack/failedattack');

        }

        $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
        $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
        $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
        $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);

        if (!isset($_POST['x']) || !isset($_POST['y']) || !isset($_POST['spear']) ||
            !isset($_POST['axe']) || !isset($_POST['sword']) || !isset($_POST['archer'])) {
            if ($status == 'failedattack') {
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);

            $this->view('attack/atac', ['spear'=>$spear,'axe'=>$axe,'sword'=>$sword,'archer'=>$archer,'retry' => 'yes', 'reportsCount' => $reportsCount, 'village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => (1000 * $storage)]);
                 }
            else {
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $this->view('attack/atac', ['spear'=>$spear,'axe'=>$axe,'sword'=>$sword,'archer'=>$archer,'retry' => 'no', 'reportsCount' => $reportsCount,   'village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => (1000 * $storage)]);
            }
                return;
        }

        $cod_stare = AttackGenerator::generateAttack($_SESSION['village_id'],$_POST['x'],$_POST['y'],
            $_POST['spear'], $_POST['axe'] ,$_POST['sword'],$_POST['archer'] );
         echo 'validez raspunsul';
        if ($cod_stare == 1) {

           header('Location: /Proiect-TW/mvc/public/Attack/movements');
        } else {


          header('Location: /Proiect-TW/mvc/public/attack/getattack/failed/yes');
        }
}
    public function movements($page='')
    {
        SessionValidate::validateSession();
        if ($page > TroopsMovements::getPages($_SESSION['village_id'])) {
            header('Location: /Proiect-TW/mvc/public/attack/movements/1');
        } else {
            if ($page < 1) {
                header('Location: /Proiect-TW/mvc/public/attack/movements/1');
            } else {
                $nextPage=$page+1;
                $prevPage=$page-1;
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                $maxpage = TroopsMovements::getPages($_SESSION['village_id']);
                $commands_table = TroopsMovements::generateCommands($page);
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $this->view('attack/movements', ['reportsCount'=>$reportsCount,'maxPagesNumber'=>$maxpage,'prevPage'=>$prevPage,'nextPage'=>$nextPage,'village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => (1000 * $storage), 'commands_table' => $commands_table]);
            }

        }
        return;
    }


}