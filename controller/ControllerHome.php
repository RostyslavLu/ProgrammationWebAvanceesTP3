<?php
RequirePage::model('Logbook');
class ControllerHome extends Controller{
    public function index(){

        //$logbook = new Logbook;
        //$logEntries = $logbook->select();
        //selectInnerJoin($selectFields, $table, $joinTable, $joinCondition)
        $selectFields = 'logbook.id, user.nom as nom, ip_address, visited_page, timestamp';
        $table = 'logbook';
        $joinTable = 'user';
        $joinCondition = 'logbook.user_id=user.id';
        $logbook = new Logbook;
        $logEntries = $logbook->selectInnerJoin($selectFields, $table, $joinTable, $joinCondition);
        Twig::render('home-index.php', ['logEntries' => $logEntries]);
        
    }
    public function error(){
        Twig::render('home-error.php');
    }

}

?>