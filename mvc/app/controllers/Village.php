<?php

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
        $this->view('village/privireAsupraSatului',['user_id'=>$user_id,'village_id'=>$village_id]);
    }

    public function wood()
    {
        $this->view('village/wood',[]);
    }
    public function stone()
    {
        $this->view('village/stone',[]);
    }
    public function iron()
    {
        $this->view('village/iron',[]);
    }
    public function storage()
    {
        $this->view('village/storage',[]);
    }
    public function privireDeAnsamblu()
    {
        $this->view('village/privireDeAnsamblu',[]);
    }



}