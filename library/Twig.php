<?php

class Twig {

    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true)); 

        $twig->addGlobal('path', 'http://localhost:80/webAvancee22645/ProgrammationWebAvanceesTP3/');

        if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])){
            $guest = false;
        } else {
            $guest = true;
        }
        //tableau session
        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('guest', $guest);

        echo $twig->render($template, $data);
    }
}

?>