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
    public function getAttack($status = ' ', $retry = ' ')
    {
        SessionValidate::validateSession();

        if ($status == 'failed' && $retry = 'yes') {
            header('Location: /Proiect-TW/mvc/public/attack/getattack/failedattack');

        }

        if (!isset($_POST['x']) || !isset($_POST['y']) || !isset($_POST['spear']) ||
            !isset($_POST['axe']) || !isset($_POST['sword']) || !isset($_POST['archer'])){
            if ($status == 'failedattack')
                $this->view('attack/atac', ['retry' => 'yes']);
            else
                $this->view('attack/atac', ['retry' => 'no']);
        return;
        }

        $cod_stare = AttackGenerator::generateAttack($_SESSION['village_id'],$_POST['x'],$_POST['y'],
            $_POST['spear'], $_POST['axe'] ,$_POST['sword'],$_POST['archer'] );

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
                $maxpage = TroopsMovements::getPages($_SESSION['village_id']);
                $commands_table = TroopsMovements::generateCommands($page);
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $this->view('attack/movements', ['maxPagesNumber'=>$maxpage,'prevPage'=>$prevPage,'nextPage'=>$nextPage,'village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => (1000 * $storage), 'commands_table' => $commands_table]);
            }

        }
        return;
    }


}