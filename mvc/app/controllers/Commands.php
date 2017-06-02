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
        SessionValidate::validateSession();
        VillageFunctions::validateVictory();
        if(isset($_POST['spear'])&&isset($_POST['axe'])&&isset($_POST['sword'])&&isset($_POST['archer'])){
            $ok=Barracks::addTroopsCommand($_SESSION['village_id'],$_POST['spear'],$_POST['axe'],$_POST['sword'],$_POST['archer']);
        }

        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id'])*1000;

        $spearStoneCost=Barracks::getSpearStoneCost();
        $spearWoodCost=Barracks::getSpearWoodCost();
        $spearIronCost=Barracks::getSpearIronCost();

        $axeStoneCost=Barracks::getAxeStoneCost();
        $axeWoodCost=Barracks::getAxeWoodCost();
        $axeIronCost=Barracks::getAxeIronCost();

        $swordStoneCost=Barracks::getSwordStoneCost();
        $swordWoodCost=Barracks::getSwordWoodCost();
        $swordIronCost=Barracks::getSwordIronCost();

        $archerStoneCost=Barracks::getArcherStoneCost();
        $archerWoodCost=Barracks::getArcherWoodCost();
        $archerIronCost=Barracks::getArcherIronCost();

        $troopsName=Barracks::getTroopNames($_SESSION['village_id']);
        $troopsNumber=Barracks::getTroopsNumber($_SESSION['village_id']);
        $troopsTime=Barracks::getTroopsTime($_SESSION['village_id']);
        $this->view('commands/cazarma',['reportsCount'=>$reportsCount,
            'village_name'=>$village_name,'iron'=>$iron,'stone'=>$stone,
            'wood'=>$wood,'storage'=>$storage,
            'archerStoneCost'=>$archerStoneCost,'archerWoodCost'=>$archerWoodCost,'archerIronCost'=>$archerIronCost,
            'swordStoneCost'=>$swordStoneCost,'swordWoodCost'=>$swordWoodCost,'swordIronCost'=>$swordIronCost,
            'axeStoneCost'=>$axeStoneCost,'axeWoodCost'=>$axeWoodCost,'axeIronCost'=>$axeIronCost,
            'spearStoneCost'=>$spearStoneCost,'spearWoodCost'=>$spearWoodCost,'spearIronCost'=>$spearIronCost,
            'troopsName'=>$troopsName,'troopsNumber'=>$troopsNumber,
            'troopsTime'=>$troopsTime

        ]);

    }
    
    public function construct($status='')
    {
        SessionValidate::validateSession();
        VillageFunctions::validateVictory();
        $villageId = $_SESSION['village_id'];
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id'])*1000;
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);

        $mainBuildingLevel = MainBuilding::getMainBuildingLevel($villageId);
        $wallLevel = MainBuilding::getWallLevel($villageId);
        $barracksLevel = MainBuilding::getBarracksLevel($villageId);
        $stoneLevel = MainBuilding::getStoneLevel($villageId);
        $woodLevel = MainBuilding::getWoodLevel($villageId);
        $ironLevel = MainBuilding::getIronLevel($villageId);
        $storageLevel = MainBuilding::getStorageLevel($villageId);

        $mainBuildingNecessities_iron = MainBuilding::getNecessities_iron($villageId,1)*$mainBuildingLevel;
        $mainBuildingNecessities_wood = MainBuilding::getNecessities_wood($villageId,1)*$mainBuildingLevel;
        $mainBuildingNecessities_stone = MainBuilding::getNecessities_stone($villageId,1)*$mainBuildingLevel;

        $wallNecessities_iron = MainBuilding::getNecessities_iron($villageId,2)*$wallLevel;
        $wallNecessities_wood = MainBuilding::getNecessities_wood($villageId,2)*$wallLevel;
        $wallNecessities_stone = MainBuilding::getNecessities_stone($villageId,2)*$wallLevel;

        $barracksNecessities_iron = MainBuilding::getNecessities_iron($villageId,3)*$barracksLevel;
        $barracksNecessities_wood = MainBuilding::getNecessities_wood($villageId,3)*$barracksLevel;
        $barracksNecessities_stone = MainBuilding::getNecessities_stone($villageId,3)*$barracksLevel;

        $stoneNecessities_iron = MainBuilding::getNecessities_iron($villageId,4)*$stoneLevel;
        $stoneNecessities_wood = MainBuilding::getNecessities_wood($villageId,4)*$stoneLevel;
        $stoneNecessities_stone = MainBuilding::getNecessities_stone($villageId,4)*$stoneLevel;

        $woodNecessities_iron = MainBuilding::getNecessities_iron($villageId,5)*$woodLevel;
        $woodNecessities_wood = MainBuilding::getNecessities_wood($villageId,5)*$woodLevel;
        $woodNecessities_stone = MainBuilding::getNecessities_stone($villageId,5)*$woodLevel;

        $ironNecessities_iron = MainBuilding::getNecessities_iron($villageId,6)*$ironLevel;
        $ironNecessities_wood = MainBuilding::getNecessities_wood($villageId,6)*$ironLevel;
        $ironNecessities_stone = MainBuilding::getNecessities_stone($villageId,6)*$ironLevel;

        $storageNecessities_iron = MainBuilding::getNecessities_iron($villageId,7)*$storageLevel;
        $storageNecessities_wood = MainBuilding::getNecessities_wood($villageId,7)*$storageLevel;
        $storageNecessities_stone = MainBuilding::getNecessities_stone($villageId,7)*$storageLevel;


        $mainBuildingTime = MainBuilding::getMainBuildingTime($villageId);
        $mainBuldingTimeFinal = ($mainBuildingTime*$mainBuildingLevel);

        $wallTime = MainBuilding::getWallTime($villageId);
        $wallTimeFinal = max((($wallTime*$wallLevel)-($mainBuildingLevel*2)),10);

        $barracksTime = MainBuilding::getBarracksTime($villageId);
        $barracksTimeFinal = max((($barracksTime*$barracksLevel)-($mainBuildingLevel*2)),10);

        $stoneTime = MainBuilding::getStoneTime($villageId);
        $stoneTimeFinal = max((($stoneTime*$stoneLevel)-($mainBuildingLevel*2)),10);

        $woodTime = MainBuilding::getWoodTime($villageId);
        $woodTimeFinal = max((($woodTime*$woodLevel)-($mainBuildingLevel*2)),10);

        $ironTime = MainBuilding::getIronTime($villageId);
        $ironTimeFinal = max((($ironTime*$ironLevel)-($mainBuildingLevel*2)),10);

        $storageTime = MainBuilding::getStorageTime($villageId);
        $storageTimeFinal = max((($storageTime*$storageLevel)-($mainBuildingLevel*2)),10);

        $mainBuildingEndTime = MainBuilding::getMainBuildingEndTime($villageId);
        $wallEndTime = MainBuilding::getWallEndTime($villageId);
        $barracksEndTime = MainBuilding::getBarracksEndTime($villageId);
        $stoneEndTime = MainBuilding::getStoneEndTime($villageId);
        $woodEndTime = MainBuilding::getWoodEndTime($villageId);
        $ironEndTime = MainBuilding::getIronEndTime($villageId);
        $storageEndTime = MainBuilding::getStorageEndTime($villageId);



        $mainBuildingInConstruction = MainBuilding::buildingInConstruction($villageId,1);
        $wallInConstruction = MainBuilding::buildingInConstruction($villageId,2);
        $barracksInConstruction = MainBuilding::buildingInConstruction($villageId,3);
        $stoneInConstruction = MainBuilding::buildingInConstruction($villageId,4);
        $woodInConstruction = MainBuilding::buildingInConstruction($villageId,5);
        $ironInConstruction = MainBuilding::buildingInConstruction($villageId,6);
        $storageInConstruction = MainBuilding::buildingInConstruction($villageId,7);



        $this->view('commands/construct',['mainBuildingLevel'=>$mainBuildingLevel,'wallLevel'=>$wallLevel,'barracksLevel'=>$barracksLevel,
            'stoneLevel'=>$stoneLevel,'woodLevel'=>$woodLevel,'ironLevel'=>$ironLevel,'storageLevel'=>$storageLevel,
            'mainBuildingNecessities_iron'=>$mainBuildingNecessities_iron,'mainBuildingNecessities_wood'=>$mainBuildingNecessities_wood,
            'mainBuildingNecessities_stone'=>$mainBuildingNecessities_stone,'wallNecessities_iron'=>$wallNecessities_iron,
            'wallNecessities_wood'=>$wallNecessities_wood,'wallNecessities_stone'=>$wallNecessities_stone,
            'barracksNecessities_iron'=>$barracksNecessities_iron,'barracksNecessities_wood'=>$barracksNecessities_wood,
            'barracksNecessities_stone'=>$barracksNecessities_stone,'stoneNecessities_iron'=>$stoneNecessities_iron,
            'stoneNecessities_wood'=>$stoneNecessities_wood,'stoneNecessities_stone'=>$stoneNecessities_stone,
            'woodNecessities_iron'=>$woodNecessities_iron,'woodNecessities_wood'=>$woodNecessities_wood,'woodNecessities_stone'=>$woodNecessities_stone,
            'ironNecessities_iron'=>$ironNecessities_iron,'ironNecessities_wood'=>$ironNecessities_wood,'ironNecessities_stone'=>$ironNecessities_stone,
            'storageNecessities_iron'=>$storageNecessities_iron,'storageNecessities_wood'=>$storageNecessities_wood,
            'storageNecessities_stone'=>$storageNecessities_stone,'iron'=>$iron,'wood'=>$wood,'stone'=>$stone,'village_name'=>$village_name,
            'mainBuildingTimeFinal'=>$mainBuldingTimeFinal,'wallTimeFinal'=>$wallTimeFinal,'barracksTimeFinal'=>$barracksTimeFinal,
            'stoneTimeFinal'=>$stoneTimeFinal,'woodTimeFinal'=>$woodTimeFinal,'ironTimeFinal'=>$ironTimeFinal,
            'storageTimeFinal'=>$storageTimeFinal,'storage'=>$storage,'mainBuildingEndTime'=>$mainBuildingEndTime,'wallEndTime'=>$wallEndTime,
            'barracksEndTime'=>$barracksEndTime,'stoneEndTime'=>$stoneEndTime,'woodEndTime'=>$woodEndTime,'ironEndTime'=>$ironEndTime,
            'storageEndTime'=>$storageEndTime, 'status'=>$status, 'mainInConstruction'=>$mainBuildingInConstruction,'wallInConstruction'=>$wallInConstruction,
            'barracksInConstruction'=>$barracksInConstruction,'stoneInConstruction'=>$stoneInConstruction,'woodInConstruction'=>$woodInConstruction,
            'ironInConstruction'=>$ironInConstruction,'storageInConstruction'=>$storageInConstruction,'reportsCount'=>$reportsCount]);

    }

    public function constructOrder($buildingId='')
    {
        SessionValidate::validateSession();
        VillageFunctions::validateVictory();
        $villageId = $_SESSION['village_id'];
        $ok = MainBuilding::levelUpBuilding($villageId,$buildingId);

        if($ok!=null)
        {
            header('Location: /Proiect-TW/mvc/public/commands/construct/loading');
        }
        else
            header('Location: /Proiect-TW/mvc/public/commands/construct/fail');
    }

}