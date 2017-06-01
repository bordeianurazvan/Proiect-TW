<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Valentin Damoc
 * Date: 6/1/2017
 * Time: 1:12 PM
 */
class Victory extends Controller
{
  public function winner(){
      $this->view('victory/winner');
  }
}