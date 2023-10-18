<?php

RequirePage::model('Privilege');
RequirePage::model('User');
RequirePage::model('Logbook');
class ControllerUser extends Controller {
    public function index() {

        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
        
    }

    public function create() {
        $privilege = new Privilege;
        $select = $privilege->select();

        Twig::render('user-create.php', ['privileges'=>$select]);
    }

    public function store() {

        if ($_SERVER["REQUEST_METHOD"]!="POST") {
           RequirePage::redirect('user/create');
           exit();
        }

        extract($_POST);
        RequirePage::library('Validation');
        $validation = new Validation();

        $validation->name('nom')->value($nom)->min(2)->max(30)->pattern('alpha')->required();
        $validation->name('username')->value($username)->min(2)->max(45)->pattern('email')->required();
        $validation->name('password')->value($password)->min(6)->max(255)->pattern('alphanum')->required();
        $validation->name('privilege_id')->value($privilege_id)->required();
        
        if ($validation->isSuccess()) {
     
            $user = new User;
            $option  = [
                'cost' => 10,
            ];
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $option);
            $_POST['password'] = $hashPassword;

            $insert = $user->insert($_POST);
            RequirePage::redirect('user/create');

        } else {
            $errors = $validation->displayErrors();
            $privilege = new Privilege;
            $select = $privilege->select();
  
            Twig::render('user-create.php', ['privileges'=>$select, 'errors'=>$errors, 'data'=>$_POST]);
        }
    }
}