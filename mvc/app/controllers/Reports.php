<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Razvan Bordeianu
 * Date: 28.05.2017
 * Time: 10:51
 */
class Reports extends Controller
{
    public function reportslist($page=' ')
    {
        $reportsCount=Report::getReportsCount($_SESSION['user_id']);
        $this->view('reports/reports',['reportsCount'=>$reportsCount]);
        return;
    }
    public function report($report_id=' '){
        if(Report::checkReport($report_id)) {
            $reportsCount=Report::getReportsCount($_SESSION['user_id']);
            $title=Report::getTitle($report_id);
            $attSearC=Report::getsAttSpearCount($report_id);
            $attAxeC=Report::getsAttAxeCount($report_id);
            $attSwordC=Report::getsAttSwordCount($report_id);
            $attArcherC=Report::getsAttArcherCount($report_id);
            $attSpearD =Report::getsAttSpearDeadCount($report_id);
            $attAxeD=Report::getsAttAxeDeadCount($report_id);
            $attSwordD=Report::getsAttSwordDeadCount($report_id);
            $attArcherD=Report::getsAttArcherDeadCount($report_id);
            $defSpearC=Report::getsDefSpearCount($report_id);
            $defAxeC=Report::getsDefAxeCount($report_id);
            $defSwordC=Report::getsDefSwordCount($report_id);
            $defArcherC=Report::getsDefArcherCount($report_id);
            $defSpearD=Report::getsDefSpearDeadCount($report_id);
            $defAxeD=Report::getsDefAxeDeadCount($report_id);
            $defSwordD=Report::getsDefSwordDeadCount($report_id);
            $defArcherD=Report::getsDefArcherDeadCount($report_id);
            $attName=Report::getAttackerUsername($report_id);
            $defName=Report::getDefenderUsername($report_id);
            $attVillageName=Report::getAttackerVillageName($report_id);
            $defVillageName=Report::getDefenderVillageName($report_id);
            $msg=Report::getMessage($report_id);
            $this->view('reports/actual-report',
                ['title'=>$title,'attSpearC'=>$attSearC,'attAxeC'=>$attAxeC,'attSwordC'=>$attSwordC,'attArcherC'=>$attArcherC,
                    'defSpearC'=>$defSpearC,'defAxeC'=>$defAxeC,'defSwordC'=>$defSwordC,'defArcherC'=>$defArcherC,
                    'attSpearD'=>$attSpearD,'attAxeD'=>$attAxeD,'attSwordD'=>$attSwordD,'attArcherD'=>$attArcherD,
                    'defSpearD'=>$defSpearD,'defAxeD'=>$defAxeD,'defSwordD'=>$defSwordD,'defArcherD'=>$defArcherD,
                    'attName'=>$attName,'defName'=>$defName,'attVillageName'=>$attVillageName,'defVillageName'=>$defVillageName,
                    'msg'=>$msg,'reportsCount'=>$reportsCount
                    ]);
        }
        else{
             header('Location: /Proiect-TW/mvc/public/reports/reportslist');
        }
        return;
    }

}