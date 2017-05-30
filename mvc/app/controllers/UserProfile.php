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
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id'])*1000;
        $username = Profile::getUsername($_SESSION['user_id']);
        $signUpDate = Profile::getSignUpDate($_SESSION['user_id']);
        $numberOfVillages = Profile::getNumberOfVillages($_SESSION['user_id']);
        $varsta = Profile::getUserAge($_SESSION['user_id']);

        if($username != null && $signUpDate != null && $numberOfVillages != null && $varsta != null )
        {
            $battleRank = RankingFunctions::getUsersAttackPoints($username);
            $generalRank = RankingFunctions::getUsersGeneralPoints($username);

            $this->view('user/profile',['username'=>$username,'signUpDate'=>$signUpDate,
                'numberOfVillages'=>$numberOfVillages,'varsta'=>$varsta,'village_name'=>$village_name,
                'iron'=>$iron,'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,
                'generalPoints'=>$generalRank,'battlePoints'=>$battleRank]);
        }


    }

    public function changePassword($status=' ',$retry=' ')
    {
        SessionValidate::validateSession();
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

        $userId = Profile::changeUserPassword($_POST['username'], $_POST['oldPassword'], $_POST['newPassword']);
        if ($userId != null) {
            header('Location: /Proiect-TW/mvc/public/UserProfile/getProfile');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/changePassword/failed/yes');
        }
    }

    public function changeUsername($status=' ',$retry=' ')
    {
        SessionValidate::validateSession();
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

        $userId = Profile::changeUsername($username,$_POST['password'], $_POST['newUsername']);
        if ($userId != null)
        {
          //  $_SESSION['village_name'] = $user;
            header('Location: /Proiect-TW/mvc/public/UserProfile/getProfile');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/changeUsername/failed/yes');
        }
    }

    public function delete($status=' ',$retry=' ')
    {
        SessionValidate::validateSession();
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

        $ok = Profile::deleteUserAccount($username,$_POST['password']);
        if ($ok != null) {
            header('Location: /Proiect-TW/mvc/public');
        } else {


            header('Location: /Proiect-TW/mvc/public/UserProfile/delete/failed/yes');
        }
    }

    public function info()
    {
        SessionValidate::validateSession();
        if (!isset($_POST['textarea']))
        {
            $this->view('user/info',[]);
            return;
        }

        $userId = Profile::createTicket($_SESSION['user_id'],$_POST['textarea']);

        if ($userId != null) {
            header('Location: /Proiect-TW/mvc/public/UserProfile/info');
        } else {

            header('Location: /Proiect-TW/mvc/public/UserProfile/info');
        }

    }

    public function getOtherProfile($username='')
    {
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id'])*1000;

        $otherUsername = $username;
        $ok = Profile::validateUser($otherUsername);

        if($ok == 0)
            header('Location: /Proiect-TW/mvc/public/ranking/rankingPopulation/1');

        if($otherUsername != null)
            $otherUserId = Profile::getUserId($username);

             $battleRank = RankingFunctions::getUsersAttackPoints($otherUsername);
             $generalRank = RankingFunctions::getUsersGeneralPoints($otherUsername);

            $signUpDate = Profile::getSignUpDate($otherUserId);
            $numberOfVillages = Profile::getNumberOfVillages($otherUserId);
            $varsta = Profile::getUserAge($otherUserId);



        if($otherUsername != null && $signUpDate != null && $numberOfVillages != null && $varsta != null )
        {
            $this->view('user/otherProfile',['otherUsername'=>$otherUsername,'signUpDate'=>$signUpDate,
                'numberOfVillages'=>$numberOfVillages,'varsta'=>$varsta,'village_name'=>$village_name,
                'iron'=>$iron,'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'otherUserID'=>$otherUserId,
                'generalPoints'=>$generalRank,'battlePoints'=>$battleRank]);
        }
    }

    public function getOtherProfileByMap($coord_x = '',$coord_y='')
    {
        SessionValidate::validateSession();
        $village_name = VillageFunctions::getVillageName($_SESSION['user_id']);
        $iron = VillageFunctions::getIronResources($_SESSION['village_id']);
        $stone = VillageFunctions::getStoneResources($_SESSION['village_id']);
        $wood = VillageFunctions::getWoodResources($_SESSION['village_id']);
        $storage = VillageFunctions::getStorrageLevel($_SESSION['village_id'])*1000;


        $otherUsername = Profile::getUsernameByMap($coord_x,$coord_y);
        if($otherUsername == null)
            header('Location: /Proiect-TW/mvc/public/map/getMap');
        else
        {
            $battleRank = RankingFunctions::getUsersAttackPoints($otherUsername);
            $generalRank = RankingFunctions::getUsersGeneralPoints($otherUsername);

            $otherUserId = Profile::getUserId($otherUsername);

            $signUpDate = Profile::getSignUpDate($otherUserId);
            $numberOfVillages = Profile::getNumberOfVillages($otherUserId);
            $varsta = Profile::getUserAge($otherUserId);



            if($otherUsername != null && $signUpDate != null && $numberOfVillages != null && $varsta != null )
            {
                $this->view('user/otherProfile',['otherUsername'=>$otherUsername,'signUpDate'=>$signUpDate,
                    'numberOfVillages'=>$numberOfVillages,'varsta'=>$varsta,'village_name'=>$village_name,
                    'iron'=>$iron,'stone'=>$stone,'wood'=>$wood,'storage'=>$storage,'otherUserID'=>$otherUserId,
                    'generalPoints'=>$generalRank,'battlePoints'=>$battleRank]);
            }
        }

    }

}