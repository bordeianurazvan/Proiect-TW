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
        $harta =MapGenerator::getMap();
        if($type =='attack')
            header('Location: /Proiect-TW/mvc/public/attack/getAttack');

        if($x!='' and $y!='') {

            $_SESSION['x']=$x;
            $_SESSION['y']=$y;

        }
            else {
            $harta = MapGenerator::getMap();
            $this->view('map/map', ['generatedMap' => $harta]);
        }
    }


}