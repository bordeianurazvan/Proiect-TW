<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:38
 */
class Commands extends Controller
{
    public function cazarma()
    {
        $this->view('village/cazarma',[]);
    }
    public function construct()
    {
        SessionValidate::validateSession();

        $villageId = $_SESSION['village_id'];
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);

        $mainBuildingLevel = MainBuilding::getMainBuildingLevel($villageId);
        $wallLevel = MainBuilding::getWallLevel($villageId);
        $barracksLevel = MainBuilding::getBarracksLevel($villageId);
        $stoneLevel = MainBuilding::getStoneLevel($villageId);
        $woodLevel = MainBuilding::getWoodLevel($villageId);
        $ironLevel = MainBuilding::getIronLevel($villageId);
        $storageLevel = MainBuilding::getStorageLevel($villageId);
        $mainBuildingNecessities = MainBuilding::getMainBuildingNecessities($villageId);
        $wallNecessities = MainBuilding::getWallNecessities($villageId);
        $barracksNecessities = MainBuilding::getBarracksNecessities($villageId);
        $stoneNecessities = MainBuilding::getStoneNecessities($villageId);
        $woodNecessities = MainBuilding::getWoodNecessities($villageId);
        $ironNecessities = MainBuilding::getIronNecessities($villageId);
        $storageNecessities = MainBuilding::getStorageNecessities($villageId);
        $mainBuildingTime = MainBuilding::getMainBuildingTime($villageId);
        $mainBuldingTimeFinal = ($mainBuildingTime*$mainBuildingLevel);
        $wallTime = MainBuilding::getWallTime($villageId);
        $wallTimeFinal = ($wallTime*$wallLevel);
        $barracksTime = MainBuilding::getBarracksTime($villageId);
        $barracksTimeFinal = ($barracksTime*$barracksLevel);
        $stoneTime = MainBuilding::getStoneTime($villageId);
        $stoneTimeFinal = ($stoneTime*$stoneLevel);
        $woodTime = MainBuilding::getWoodTime($villageId);
        $woodTimeFinal = ($woodTime*$woodLevel);
        $ironTime = MainBuilding::getIronTime($villageId);
        $ironTimeFinal = ($ironTime*$ironLevel);
        $storageTime = MainBuilding::getStorageTime($villageId);
        $storageTimeFinal = ($storageTime*$storageLevel);

        $this->view('commands/construct',['mainBuildingLevel'=>$mainBuildingLevel,'wallLevel'=>$wallLevel,'barracksLevel'=>$barracksLevel,
            'stoneLevel'=>$stoneLevel,'woodLevel'=>$woodLevel,'ironLevel'=>$ironLevel,'storageLevel'=>$storageLevel,
            'mainBuildingNecessities'=>$mainBuildingNecessities,'wallNecessities'=>$wallNecessities,'barracksNecessities'=>$barracksNecessities,
            'stoneNecessities'=>$stoneNecessities,'woodNecessities'=>$woodNecessities,'ironNecessities'=>$ironNecessities,
            'storageNecessities'=>$storageNecessities,'iron'=>$iron,'wood'=>$wood,'stone'=>$stone,'village_name'=>$village_name,
        'mainBuildingTimeFinal'=>$mainBuldingTimeFinal,'wallTimeFinal'=>$wallTimeFinal,'barracksTimeFinal'=>$barracksTimeFinal,
            'stoneTimeFinal'=>$stoneTimeFinal,'woodTimeFinal'=>$woodTimeFinal,'ironTimeFinal'=>$ironTimeFinal,
            'storageTimeFinal'=>$storageTimeFinal]);

    }

}