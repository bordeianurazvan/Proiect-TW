<?php

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
        $this->view('ranking/rankingAttackers',[]);
    }

    public function rankingPopulation()
    {
        $this->view('ranking/rankingPopulation',[]);
    }


}