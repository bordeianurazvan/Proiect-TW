<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/26/2017
 * Time: 5:54 PM
 */
class Home extends Controller
{
   public function  index($name=' ',$otherName = '')
   {
          $user = $this->model('User');
          $user->name = $name;
          $this->view('home/index',['name'=>$user->name,'pute'=>$otherName]);
   }
   public function login()
   {
       if (!isset($_POST['username']) || !isset($_POST['password']))
       {
           $this->view('home/login',[]);
           return;
       }

       $user = User::login($_POST['username'],$_POST['password']);
        if($user!=null)
        {
            header('Location: home/privireAsupraSatului');
        }
        else
        {
            echo 'login nereusit';
        }


   }
   public function register()
   {
       if (!isset($_POST['user_name']) || !isset($_POST['password']) ||!isset($_POST['c_password']) || !isset($_POST['bday']) )
       {
           $this->view('home/register',[]);
           return;
       }
       $user = User::register($_POST['user_name'],$_POST['password'],$_POST['c_password'],$_POST['bday']);
       if($user!=null)
       {
           echo $user->user_id;

           header('Location: ../login');
       }
       else
       {

           $this->view('home/register',[]);
       }
   }

   public function privireAsupraSatului()
   {
       $this->view('home/privireAsupraSatului',[]);
   }

   public function wood()
   {
       $this->view('home/wood',[]);
   }
   public function stone()
    {
        $this->view('home/stone',[]);
    }
    public function iron()
    {
        $this->view('home/iron',[]);
    }
    public function storage()
    {
        $this->view('home/storage',[]);
    }
    public function privireDeAnsamblu()
    {
        $this->view('home/privireDeAnsamblu',[]);
    }
}