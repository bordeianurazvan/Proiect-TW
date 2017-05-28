<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/26/2017
 * Time: 5:54 PM
 */
class Home extends Controller
{

   public function login($status=' ',$retry=' ')
   {
       if($status=='failed' && $retry ='yes' )
       {
           header('Location: /Proiect-TW/mvc/public/home/login/failedlogin');

       }
            if (!isset($_POST['username']) || !isset($_POST['password'])) {
              if($status=='failedlogin')
                  $this->view('home/login', ['retry'=>'yes']);
                  else
                 $this->view('home/login', ['retry'=>'no']);
                return;
            }

            $user = User::login($_POST['username'], $_POST['password']);
            if ($user != null) {
                session_start();
                $_SESSION['user_id'] = $user->user_id;
                header('Location: /Proiect-TW/mvc/public/village/privireAsupraSatului/');
            } else {


                header('Location: /Proiect-TW/mvc/public/home/login/failed/yes');
            }
        }



   public function register($status=' ',$retry=' ')
   {
       if($status=='failed' && $retry ='yes' )
       {
           header('Location: /Proiect-TW/mvc/public/home/register/failedregister');

       }
       if (!isset($_POST['user_name']) || !isset($_POST['password']) ||!isset($_POST['c_password']) || !isset($_POST['bday']) )
       {    if($status=='failedregister')
           $this->view('home/register', ['retry'=>'yes']);
       else
           $this->view('home/register', ['retry'=>'no']);
           return;
       }
       $user = User::register($_POST['user_name'],$_POST['password'],$_POST['c_password'],$_POST['bday']);
       if($user!=null)
       {
           echo $user->user_id;

           header('Location: /Proiect-TW/mvc/public/home/login');
       }
       else
       {

           header('Location: /Proiect-TW/mvc/public/home/register/failed/yes');
       }
   }

    public function terms()
    {

            $this->view('home/terms',[]);

    }


}