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

    public function changePassword()
    {

    }

    public function changeUsername()
    {

    }

    public function delete()
    {

    }

    public function info()
    {

    }

}