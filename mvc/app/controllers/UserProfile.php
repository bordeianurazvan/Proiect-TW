<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:41
 */
class UserProfile extends Controller
{
    public function getProfile()
    {
        $username = Profile::getUsername($_SESSION['user_id']);
        $signUpDate = Profile::getSignUpDate($_SESSION['user_id']);
        $numberOfVillages = Profile::getNumberOfVillages($_SESSION['user_id']);
        $varsta = Profile::getUserAge($_SESSION['user_id']);

        if($username != null && $signUpDate != null && $numberOfVillages != null && $varsta != null )
        {
            $this->view('user/profile',['username'=>$username,'signUpDate'=>$signUpDate,
                                              'numberOfVillages'=>$numberOfVillages,'varsta'=>$varsta]);
        }


    }

    public function changePassword($status=' ',$retry=' ')
    {
        if($status=='failed' && $retry ='yes' )
        {
            header('Location: /Proiect-TW/mvc/public/UserProfile/changePassword/failedpassword');

        }
        if (!isset($_POST['username']) || !isset($_POST['oldPassword']) || !isset($_POST['newPassword']))
        {
            if($status=='failedpassword')
                $this->view('user/changePassword', ['retry'=>'yes']);
            else
                $this->view('user/changePassword', ['retry'=>'no']);
            return;
        }

        $user = Profile::changeUserPassword($_POST['username'], $_POST['oldPassword'], $_POST['newPassword']);
        if ($user != null) {
            header('Location: /Proiect-TW/mvc/public/UserProfile/getProfile');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/changePassword/failed/yes');
        }
    }

    public function changeUsername($status=' ',$retry=' ')
    {
        $username = Profile::getUsername($_SESSION['user_id']);


        if($status=='failed' && $retry ='yes' )
        {

            header('Location: /Proiect-TW/mvc/public/UserProfile/changeUsername/failedUsername');

        }
        if (!isset($_POST['password']) || !isset($_POST['newUsername']))
        {
            if($status=='failedUsername')
                $this->view('user/changeUsername', ['retry'=>'yes']);
            else
                $this->view('user/changeUsername', ['retry' => 'no']);

            return;
        }

        $user = Profile::changeUsername($username,$_POST['password'], $_POST['newUsername']);
        if ($user != null) {
            header('Location: /Proiect-TW/mvc/public/UserProfile/getProfile');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/changeUsername/failed/yes');
        }
    }

    public function delete($status=' ',$retry=' ')
    {
        $username = Profile::getUsername($_SESSION['user_id']);


        if($status=='failed' && $retry ='yes' )
        {

            header('Location: /Proiect-TW/mvc/public/UserProfile/delete/failedDelete');

        }
        if (!isset($_POST['password']))
        {
            if($status=='failedDelete')
                $this->view('user/deleteAccount', ['retry'=>'yes']);
            else
                $this->view('user/deleteAccount', ['retry' => 'no']);

            return;
        }

        $user = Profile::deleteUserAccount($username,$_POST['password']);
        if ($user != null) {
            header('Location: /Proiect-TW/mvc/public');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/delete/failed/yes');
        }
    }

    public function info()
    {

    }

}