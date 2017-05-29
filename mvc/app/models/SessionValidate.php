<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/29/2017
 * Time: 11:58 AM
 */
class SessionValidate
{
  public static function validateSession()
  {
      if($_SESSION['user_id']==null)
      {
          header('Location: /Proiect-Tw/mvc/public/home/login');
      }
  }
}