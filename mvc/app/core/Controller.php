<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/26/2017
 * Time: 5:49 PM
 */
include_once '../app/models/user.php';
class Controller
{

  public function model($model)
  {
      require_once '../app/models/'.$model.'.php';
      return new $model();
  }
  public function view($view,$data = [])
    {
            require_once  '../app/views/' . $view . '.php';
    }
}
?>