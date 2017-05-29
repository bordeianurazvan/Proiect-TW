<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Damoc Valentin
 * Date: 28.05.2017
 * Time: 10:49
 */
class Ranking extends Controller
{
    public function rankingAttackers()
    {
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $this->view('ranking/rankingAttackers', ['village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage]);
    }

    public function rankingPopulation()
    {
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $this->view('ranking/rankingPopulation', ['village_name' => $village_name, 'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage]);
    }


}