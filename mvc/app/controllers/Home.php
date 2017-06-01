<?php
session_start();
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
       session_destroy();
       if($status=='failed' && $retry ='yes' )
       {
           header('Location: /Proiect-TW/mvc/public/home/login/failedlogin');

       }
            if (!isset($_POST['username']) || !isset($_POST['password'])) {
              if($status=='failedlogin')
                  $this->view('home/login', ['retry'=>'yes','popup' => 'no','invalid_username'=>'no']);
                  else
                 $this->view('home/login', ['retry'=>'no','popup' => 'no','invalid_username'=>'no']);
                return;
            }

            $user = User::login($_POST['username'], $_POST['password']);
            if ($user != null) {
                session_start();
                $_SESSION['user_id'] = $user->user_id;
                header('Location: /Proiect-TW/mvc/public/village/villageView/');
            } else {


                header('Location: /Proiect-TW/mvc/public/home/login/failed/yes');
            }
        }
    public function loginFb($id='',$username='')
    {   echo 'Am intrat in loginFB';

        $_SESSION['fb_id'] = $id;
        if(!isset($_POST['name'])) {

            $stare_id = LoginFb::validateId($id);
            $stare_username = LoginFb::validateName($username);
            if ($stare_id == 0 && $stare_username == 0) {
                $bday = date('d-m-Y h:i:s');
                $new_user = User::registerFB($username, $id,$id, $bday,$id);
                if ($new_user != null) {

                    $_SESSION['user_id'] = LoginFb::getIdByFbId($id);
                    header('Location: /Proiect-TW/mvc/public/village/villageView/');
                //echo 'header(\'Location: /Proiect-TW/mvc/public/village/villageView/\');';
                } else {
                    header('Location: /Proiect-TW/mvc/public/home/register');
                //echo 'header(\'Location: /Proiect-TW/mvc/public/village/villageView/\');';
                }

            } elseif ($stare_id != 0) {

                $_SESSION['user_id'] = LoginFb::getIdByFbId($id);
                header('Location: /Proiect-TW/mvc/public/village/villageView/');
                //echo 'header(\'Location: /Proiect-TW/mvc/public/village/villageView/\'); ';
            } elseif ($stare_id == 0 && $stare_username != 0) {
                $this->view('home/login', ['retry' => 'no', 'popup' => 'yes','invalid_username'=>'no']);
                //echo ' ma duc pe view cu popup yes';
            }
            return;
        }
        else
        {
            $stare_username = LoginFb::validateName($_POST['name']);
            if($stare_username==0)
            {
                $bday = date('d-m-Y h:i:s');
                $new_user = User::registerFB($_POST['name'], $_SESSION['fb_id'], $_SESSION['fb_id'], $bday,$_SESSION['fb_id']);
                if ($new_user != null) {
                    session_start();
                    $_SESSION['user_id'] = LoginFb::getIdByFbId($id);
                    header('Location: /Proiect-TW/mvc/public/village/villageView/');
                } else {
                    echo 'Eroare la register fb';
                    //header('Location: /Proiect-TW/mvc/public/home/register');
                }
            }
            else
            {
                $this->view('home/login', ['retry' => 'no', 'popup' => 'yes','invalid_username'=>'yes']);
            }
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
        SessionValidate::validateSession();
            $this->view('home/terms',[]);

    }


}