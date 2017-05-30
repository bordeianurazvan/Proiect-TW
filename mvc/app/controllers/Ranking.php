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
    public function rankingAttackers($page='')
    {
        SessionValidate::validateSession();
        if($page>RankingFunctions::getNumberOfPagesPopulation()) {
            header('Location: /Proiect-TW/mvc/public/ranking/rankingAttackers/1');
        }else{
            if($page<1) {
                header('Location: /Proiect-TW/mvc/public/ranking/rankingAttackers/1');
            }else{
                $currentPage=$page;
                $nextPage=$page+1;
                $prevPage=$page-1;
                $maxPagesNumber=RankingFunctions::getNumberOfPagesPopulation();
                $resultsList=RankingFunctions::getUsersPageAttack($page);
                $villageList=RankingFunctions::getVillagesPage($resultsList);
                $pointsList=RankingFunctions::getAttackPointsPage($resultsList);
                $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $this->view('ranking/rankingAttackers', ['village_name' => $village_name, 'iron' => $iron,
                    'stone' => $stone, 'wood' => $wood, 'storage' => $storage,'currentPage'=>$currentPage,
                    'nextPage'=>$nextPage,'prevPage'=>$prevPage,'maxPagesNumber'=>$maxPagesNumber,
                    'villageList'=>$villageList,'pointsList'=>$pointsList,'resultsList'=>$resultsList]);
            }
        }
    }

    public function rankingPopulation($page='')
    {
        SessionValidate::validateSession();
        $usersCount=RankingFunctions::getNumberOfUsers();
        if($page>RankingFunctions::getNumberOfPagesPopulation()) {
            header('Location: /Proiect-TW/mvc/public/ranking/rankingPopulation/1');
        }else{
            if($page<1) {
                header('Location: /Proiect-TW/mvc/public/ranking/rankingPopulation/1');
            }else{
                $currentPage=$page;
                $nextPage=$page+1;
                $prevPage=$page-1;
                $maxPagesNumber=RankingFunctions::getNumberOfPagesPopulation();
                $resultsList=RankingFunctions::getUsersPage($page);
                $villageList=RankingFunctions::getVillagesPage($resultsList);
                $pointsList=RankingFunctions::getPointsPage($resultsList);
                $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $this->view('ranking/rankingPopulation', ['village_name' => $village_name, 'iron' => $iron,
                    'stone' => $stone, 'wood' => $wood, 'storage' => $storage,'currentPage'=>$currentPage,
                    'nextPage'=>$nextPage,'prevPage'=>$prevPage,'maxPagesNumber'=>$maxPagesNumber,
                    'villageList'=>$villageList,'pointsList'=>$pointsList,'resultsList'=>$resultsList]);
            }
        } }


}