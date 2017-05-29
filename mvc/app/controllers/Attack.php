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

        $cod_stare = AttackGenerator::generateAttack($_SESSION[village_id],$_POST['x'],$_POST['y'],
            $_POST['spear'], $_POST['axe'] ,$_POST['sword'],$_POST['archer'] );

        if ($cod_stare != null) {

            header('Location: /Proiect-TW/mvc/public/attack/movements/');
        } else {


            header('Location: /Proiect-TW/mvc/public/attack/getattack/failed/yes');
        }
}
    public function movements()
    {
        $this->view('attack/movements', []);
    }


}