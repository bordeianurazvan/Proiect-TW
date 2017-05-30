<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Damoc Valentin
 * Date: 28.05.2017
 * Time: 10:28
 */
class Village extends Controller
{
    public function privireAsupraSatului($x='',$y='')
    {
        if ($x == '' || $y == '') {
            SessionValidate::validateSession();
            $reportsCount=Report::getReportsCount($_SESSION['user_id']);
            $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
            $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
            $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
            $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
            $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
            $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
            $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
            $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
            $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);
            $this->view('village/privireAsupraSatului', ['village_name' => $village_name,
                'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage,
                'spear' => $spear, 'axe' => $axe, 'sword' => $sword, 'archer' => $archer,'reportsCount'=>$reportsCount]);
        }
        else{
            if (VillageFunctions::validateVillage($x, $y, $_SESSION['user_id'])) {
                SessionValidate::validateSession();
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                $village_name = VillageFunctions::getVillageNameByCoords($x,$y);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
                $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
                $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
                $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);
                $this->view('village/privireAsupraSatului', ['village_name' => $village_name,
                    'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage,
                    'spear' => $spear, 'axe' => $axe, 'sword' => $sword, 'archer' => $archer,'reportsCount'=>$reportsCount]);

            }
            else{
                SessionValidate::validateSession();
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
                $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
                $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
                $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);
                $this->view('village/privireAsupraSatului', ['village_name' => $village_name, 'iron' => $iron,
                    'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'spear' => $spear, 'axe' => $axe,
                    'sword' => $sword, 'archer' => $archer,'reportsCount'=>$reportsCount]);
            }
        }
    }

    public function wood()
    {
        SessionValidate::validateSession();
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $woodLevel = VillageFunctions::getWoodLevel($_SESSION['village_id']);
        $this->view('village/wood',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'woodLevel'=>$woodLevel,'reportsCount'=>$reportsCount]);
    }
    public function stone()
    {
        SessionValidate::validateSession();
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $stoneLevel = VillageFunctions::getStoneLevel($_SESSION['village_id']);
        $this->view('village/stone',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'stoneLevel'=>$stoneLevel,'reportsCount'=>$reportsCount]);
    }
    public function iron()
    {
        SessionValidate::validateSession();
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $ironLevel = VillageFunctions::getIronLevel($_SESSION['village_id']);
        $this->view('village/iron',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'ironLevel'=>$ironLevel,'reportsCount'=>$reportsCount]);
    }
    public function storage()
    {
        SessionValidate::validateSession();
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $ironLevel = VillageFunctions::getIronLevel($_SESSION['village_id']);
        $stoneLevel = VillageFunctions::getStoneLevel($_SESSION['village_id']);
        $woodLevel = VillageFunctions::getWoodLevel($_SESSION['village_id']);

        $storageIronS =(($storage*1000 - $iron)/(100*$ironLevel))*60;
        $storageIronH =(int)($storageIronS/3600);
        $storageIronM = (int)(($storageIronS - ($storageIronH*3600))/60);
        $storageIronS = $storageIronS - ($storageIronH*3600) -($storageIronM*60);
        $storageIronTime = $storageIronH . '::' . $storageIronM . '::' . $storageIronS;

        $storageWoodS =(($storage*1000 - $wood)/(100*$woodLevel))*60;
        $storageWoodH =(int)($storageWoodS/3600);
        $storageWoodM = (int)(($storageWoodS - ($storageWoodH*3600))/60);
        $storageWoodS = $storageWoodS - ($storageWoodH*3600) -($storageWoodM*60);
        $storageWoodTime = $storageWoodH . '::' . $storageWoodM . '::' . $storageWoodS;

        $storageStoneS =(($storage*1000 - $wood)/(100*$woodLevel))*60;
        $storageStoneH =(int)($storageStoneS/3600);
        $storageStoneM = (int)(($storageStoneS - ($storageStoneH*3600))/60);
        $storageStoneS = $storageStoneS - ($storageStoneH*3600) -($storageStoneM*60);
        $storageStoneTime = $storageStoneH . '::' . $storageStoneM . '::' . $storageStoneS;
        $this->view('village/storage',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'storageIronTime'=>$storageIronTime,
            'storageWoodTime'=>$storageWoodTime,'storageStoneTime'=>$storageStoneTime,'reportsCount'=>$reportsCount]);
    }
    public function privireDeAnsamblu()
    {
        SessionValidate::validateSession();
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $villagesNumber = VillageFunctions::getNumberOfVillages($_SESSION['user_id']);
        $villagesNames = VillageFunctions::getUserVillagesNames($_SESSION['user_id']);
        $villagesResources = VillageFunctions::getUserVillagesResources($_SESSION['user_id']);
        $villagesPoints = VillageFunctions::getUserVillagesPoints($_SESSION['user_id']);
        $villagesCoords = VillageFunctions::getUserVillagesCoords($_SESSION['user_id']);
        $this->view('village/privireDeAnsamblu',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'villagesNumber'=>$villagesNumber,
            'villagesNames'=>$villagesNames,'villagesResources'=>$villagesResources,'villagesPoints'=>$villagesPoints,
            'villagesCoords'=>$villagesCoords,'reportsCount'=>$reportsCount]);
    }



}