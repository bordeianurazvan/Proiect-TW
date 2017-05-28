<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:55
 */
class Attack extends Controller
{
    public function getAttack()
    {
        $this->view('attack/atac', []);
    }
    public function movements()
    {
        $this->view('attack/movements', []);
    }


}