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
    public function privireAsupraSatului($user_id=' ',$village_id=' ')
    {
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrage($_SESSION['village_id']);
        $this->view('village/privireAsupraSatului',['village_name'=>$village_name,'iron'=>$iron,'stone'=>$stone,'wood'=>$wood,'storage'=>$storage]);
    }

    public function wood()
    {
        SessionValidate::validateSession();
        $this->view('village/wood',[]);
    }
    public function stone()
    {
        SessionValidate::validateSession();
        $this->view('village/stone',[]);
    }
    public function iron()
    {
        SessionValidate::validateSession();
        $this->view('village/iron',[]);
    }
    public function storage()
    {
        SessionValidate::validateSession();
        $this->view('village/storage',[]);
    }
    public function privireDeAnsamblu()
    {
        SessionValidate::validateSession();
        $this->view('village/privireDeAnsamblu',[]);
    }



}