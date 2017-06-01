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
    public function villageView($x='',$y='')
    {
        if(!(VillageFunctions::victory())){
        if ($x == '' || $y == '') {
            SessionValidate::validateSession();
            $reportsCount=Report::getReportsCount($_SESSION['user_id']);
            if(isset($_SESSION['village_name'])){
                $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
            }else{
                $village_name = VillageFunctions::getFirstUserVillageName($_SESSION['user_id']);
                VillageFunctions::setSessionVillageName($village_name);
                $village_id = VillageFunctions::getFirstUserVillageId($_SESSION['user_id']);
                VillageFunctions::setSessionVillageId($village_id);
            }
            $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
            $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
            $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
            $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
            $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
            $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
            $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
            $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);
            $this->view('village/villageView', ['village_name' => $village_name,
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
                $this->view('village/villageView', ['village_name' => $village_name,
                    'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage,
                    'spear' => $spear, 'axe' => $axe, 'sword' => $sword, 'archer' => $archer,'reportsCount'=>$reportsCount]);

            }
            else{
                SessionValidate::validateSession();
                $reportsCount=Report::getReportsCount($_SESSION['user_id']);
                if(isset($_SESSION['village_name'])){
                    $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
                }else{
                    $village_name = VillageFunctions::getFirstUserVillageName($_SESSION['user_id']);
                    VillageFunctions::setSessionVillageName($village_name);
                    $village_id = VillageFunctions::getFirstUserVillageId($_SESSION['user_id']);
                    VillageFunctions::setSessionVillageId($village_id);
                }
                $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                $spear = VillageFunctions::getSpearNumber($_SESSION['village_id']);
                $axe = VillageFunctions::getAxeNumber($_SESSION['village_id']);
                $sword = VillageFunctions::getSwordNumber($_SESSION['village_id']);
                $archer = VillageFunctions::getArcherNumber($_SESSION['village_id']);
                $this->view('village/villageView', ['village_name' => $village_name,
                    'iron' => $iron, 'stone' => $stone, 'wood' => $wood, 'storage' => $storage,
                    'spear' => $spear, 'axe' => $axe, 'sword' => $sword, 'archer' => $archer,'reportsCount'=>$reportsCount]);
            }
        }
        }else{
            $this->view('victory/winner');
        }
    }

    public function wood()
    {
        SessionValidate::validateSession();
        if(!(VillageFunctions::victory())){
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
        $woodLevel = VillageFunctions::getWoodLevel($_SESSION['village_id']);
        $this->view('village/wood',['village_name'=>$village_name,'iron'=>$iron,
            'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'woodLevel'=>$woodLevel,'reportsCount'=>$reportsCount]);
        }else{
            $this->view('victory/winner');
        }
    }
    public function stone()
    {
        SessionValidate::validateSession();
        if(!(VillageFunctions::victory())){
            $reportsCount = Report::getReportsCount($_SESSION['user_id']);
            $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
            $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
            $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
            $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
            $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
            $stoneLevel = VillageFunctions::getStoneLevel($_SESSION['village_id']);
            $this->view('village/stone', ['village_name' => $village_name, 'iron' => $iron,
                'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'stoneLevel' => $stoneLevel, 'reportsCount' => $reportsCount]);
        }else{
            $this->view('victory/winner');
        }
    }
    public function iron()
    {
        SessionValidate::validateSession();
        if(!(VillageFunctions::victory())){
            $reportsCount = Report::getReportsCount($_SESSION['user_id']);
            $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
            $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
            $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
            $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
            $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
            $ironLevel = VillageFunctions::getIronLevel($_SESSION['village_id']);
            $this->view('village/iron', ['village_name' => $village_name, 'iron' => $iron,
                'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'ironLevel' => $ironLevel, 'reportsCount' => $reportsCount]);
        }else{
            $this->view('victory/winner');
        }
    }
    public function storage()
    {
        SessionValidate::validateSession();
        if(!(VillageFunctions::victory())){
            $reportsCount = Report::getReportsCount($_SESSION['user_id']);
            $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
            $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
            $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
            $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
            $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
            $ironLevel = VillageFunctions::getIronLevel($_SESSION['village_id']);
            $stoneLevel = VillageFunctions::getStoneLevel($_SESSION['village_id']);
            $woodLevel = VillageFunctions::getWoodLevel($_SESSION['village_id']);

            $storageIronS = (($storage * 1000 - $iron) / (100 * $ironLevel)) * 60;
            $storageIronH = (int)($storageIronS / 3600);
            $storageIronM = (int)(($storageIronS - ($storageIronH * 3600)) / 60);
            $storageIronS = $storageIronS - ($storageIronH * 3600) - ($storageIronM * 60);
            $storageIronTime = $storageIronH . '::' . $storageIronM . '::' . $storageIronS;

            $storageWoodS = (($storage * 1000 - $wood) / (100 * $woodLevel)) * 60;
            $storageWoodH = (int)($storageWoodS / 3600);
            $storageWoodM = (int)(($storageWoodS - ($storageWoodH * 3600)) / 60);
            $storageWoodS = $storageWoodS - ($storageWoodH * 3600) - ($storageWoodM * 60);
            $storageWoodTime = $storageWoodH . '::' . $storageWoodM . '::' . $storageWoodS;

            $storageStoneS = (($storage * 1000 - $wood) / (100 * $woodLevel)) * 60;
            $storageStoneH = (int)($storageStoneS / 3600);
            $storageStoneM = (int)(($storageStoneS - ($storageStoneH * 3600)) / 60);
            $storageStoneS = $storageStoneS - ($storageStoneH * 3600) - ($storageStoneM * 60);
            $storageStoneTime = $storageStoneH . '::' . $storageStoneM . '::' . $storageStoneS;
            $this->view('village/storage', ['village_name' => $village_name, 'iron' => $iron,
                'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'storageIronTime' => $storageIronTime,
                'storageWoodTime' => $storageWoodTime, 'storageStoneTime' => $storageStoneTime, 'reportsCount' => $reportsCount]);
        }else{
            $this->view('victory/winner');
        }
    }
    public function Overview($page='')
    {
        SessionValidate::validateSession();
        if(!(VillageFunctions::victory())) {
            if ($page > VillageFunctions::getNumberOfPages($_SESSION['user_id'])) {
                header('Location: /Proiect-TW/mvc/public/villages/Overview/1');
            } else {
                if ($page < 1) {
                    header('Location: /Proiect-TW/mvc/public/villages/Overview/1');
                } else {
                    $reportsCount = Report::getReportsCount($_SESSION['user_id']);
                    $currentPage = $page;
                    $nextPage = $page + 1;
                    $prevPage = $page - 1;
                    $maxPagesNumber = VillageFunctions::getNumberOfPages($_SESSION['user_id']);
                    $villageList = VillageFunctions::getVillagesPage($page, $_SESSION['user_id']);
                    $villageIdList = VillageFunctions::getVillagesIdPage($page, $_SESSION['user_id']);
                    $coordsList = VillageFunctions::getVillagesCoordsPage($villageIdList);
                    $pointsList = VillageFunctions::getPointsPage($villageIdList);
                    $resourcesList = VillageFunctions::getResourcesPage($villageIdList);
                    $reportsCount = Report::getReportsCount($_SESSION['user_id']);
                    $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
                    $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                    $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                    $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                    $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                    $this->view('village/Overview', ['village_name' => $village_name, 'iron' => $iron,
                        'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'reportsCount' => $reportsCount,
                        'resourcesList' => $resourcesList, 'pointsList' => $pointsList, 'coordsList' => $coordsList,
                        'villageList' => $villageList, 'maxPagesNumber' => $maxPagesNumber, 'prevPage' => $prevPage,
                        'nextPage' => $nextPage, 'currentPage' => $currentPage, 'reportsCount' => $reportsCount]);
                }
            }
        }else{
            $this->view('victory/winner');
        }
    }

    public function userVillages($id_user,$page='')
    {
        SessionValidate::validateSession();
        if (!(VillageFunctions::victory())) {
            if (VillageFunctions::getNumberOfVillages($id_user) > 0) {
                if ($page > VillageFunctions::getNumberOfPages($id_user)) {
                    header('Location: /Proiect-TW/mvc/public/village/userVillages/' . $id_user . '/1');
                } else {
                    if ($page < 1) {
                        header('Location: /Proiect-TW/mvc/public/village/userVillages/' . $id_user . '/1');
                    } else {
                        $username = VillageFunctions::getUsername($id_user);
                        $id = $id_user;
                        $currentPage = $page;
                        $nextPage = $page + 1;
                        $prevPage = $page - 1;
                        $maxPagesNumber = VillageFunctions::getNumberOfPages($id_user);
                        $villageList = VillageFunctions::getVillagesPage($page, $id_user);
                        $villageIdList = VillageFunctions::getVillagesIdPage($page, $id_user);
                        $coordsList = VillageFunctions::getVillagesCoordsPage($villageIdList);
                        $pointsList = VillageFunctions::getPointsPage($villageIdList);
                        $reportsCount = Report::getReportsCount($_SESSION['user_id']);
                        $village_name = VillageFunctions::getVillageNameById($_SESSION['village_id']);
                        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
                        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
                        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
                        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id']);
                        $this->view('village/userVillages', ['village_name' => $village_name, 'iron' => $iron,
                            'stone' => $stone, 'wood' => $wood, 'storage' => $storage, 'reportsCount' => $reportsCount,
                            'pointsList' => $pointsList, 'coordsList' => $coordsList, 'username' => $username,
                            'villageList' => $villageList, 'maxPagesNumber' => $maxPagesNumber, 'prevPage' => $prevPage,
                            'nextPage' => $nextPage, 'currentPage' => $currentPage, 'reportsCount' => $reportsCount, 'id' => $id]);
                    }
                }
            } else {
                header('Location: /Proiect-TW/mvc/public/ranking/rankingPopulation/1');
            }
        }else{
            $this->view('victory/winner');
        }
    }

}