<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:52
 */
class Map extends Controller
{
    public function getMap($x ='',$y='',$type='')
    {
        SessionValidate::validateSession();

        $harta =MapGenerator::getMap();
        if($type =='attack')
            header('Location: /Proiect-TW/mvc/public/attack/getAttack');

        if($x!='' and $y!='') {

            $_SESSION['x']=$x;
            $_SESSION['y']=$y;

        }
            else {
            $harta = MapGenerator::getMap();
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrage($_SESSION['village_id']);
                $this->view('map/map',['generatedMap'=>$harta,'village_name'=>$village_name,'iron'=>$iron,'stone'=>$stone,'wood'=>$wood,'storage'=>$storage]);
        }
    }


}