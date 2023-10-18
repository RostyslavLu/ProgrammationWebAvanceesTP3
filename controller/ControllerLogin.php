<?php

RequirePage::model('Privilege');
RequirePage::model('User');


class ControllerLogin extends Controller {
    public function index()
    {

        Twig::render('login.php');

    }

    public function auth() {

        if ($_SERVER["REQUEST_METHOD"]!="POST") {
            RequirePage::redirect('login');
            exit();
        }

        extract($_POST);

        RequirePage::library('Validation');
        $validation = new Validation();
        $validation->name('username')->value($username)->min(2)->max(45)->pattern('email')->required();
        $validation->name('password')->value($password)->min(6)->max(255)->pattern('alphanum')->required();

        if ($validation->isSuccess()) {

           $user = new User;

           if ($user->checkUser($username, $password)) {
            
            $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
            
            RequirePage::redirect('home/index');
        } else {
                RequirePage::redirect('home/error');
           }
        } else {

            $errors = $validation->displayErrors();
            Twig::render('login.php', ['errors'=>$errors, 'data'=>$_POST]);
            
        }
    }

    public function logout() {
        session_destroy();
        RequirePage::redirect('login');
    }
}

?>