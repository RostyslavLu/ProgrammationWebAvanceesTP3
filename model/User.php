<?php
require_once('Crud.php');

class User extends Crud
{

    public $table = 'user';
    public $primaryKey = 'id';
    public $fillable = [
        'id',
        'nom',
        'username',
        'password',
        'privilege_id'
    ];

    public function checkUser($username, $password)
    {

        $sql  = "SELECT * FROM location_voitures.$this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));

        $count = $stmt->rowCount();


        if ($count == 1) {
            $user = $stmt->fetch();

            // verification password
            if (password_verify($password, $user['password'])) {
                //creer session d'une user
                session_regenerate_id();
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['privilege'] = $user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);


                return true;
                //RequirePage::redirect('client');
            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    public function addToLogbook($user_id, $ip_address, $visited_page) {
        $sql = "INSERT INTO logbook (user_id, ip_address, visited_page, timestamp) VALUES (?, ?, ?, NOW())";
        $stmt = $this->prepare($sql);
        $stmt->execute([$user_id, $ip_address, $visited_page]);
    }
    
}
