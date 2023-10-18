<?php
RequirePage::model('Voiture'); 
RequirePage::model('Marque'); 
RequirePage::model('User');
class ControllerMarque extends Controller{

    public function index() {
        
        $marque = new Marque;
        $select = $marque->select();
        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
        Twig::render('marque-index.php', ['marques'=>$select]);

    }
    public function create(){
        $marque = new Marque;
        $selectMarque = $marque->select();

        Twig::render('marque-create.php', ['marque'=>$selectMarque]);
    }
    public function store(){

        
        $marque = new Marque;
        $insert = $marque->insert($_POST);

        RequirePage::redirect('voiture/create');
    }
}