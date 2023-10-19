<?php
RequirePage::model('Voiture'); 
RequirePage::model('Marque'); 
RequirePage::model('User');
class ControllerVoiture extends Controller
{

    //public function index() {
    //    
    //    $voiture = new Voiture;
    //    $select = $voiture->select();
    //    
    //    Twig::render('voiture-index.php', ['voitures'=>$select]);
    //
    //}

    public function index()
    {
        $selectFields = 'voitures.id, nom, annee, prix_par_jour, disponible';
        $table = 'voitures';
        $joinTable = 'marque';
        $joinCondition = 'marque.id=marque_id';
        $voiture = new Voiture;
        $select = $voiture->selectInnerJoin($selectFields, $table, $joinTable, $joinCondition);

        Twig::render('voiture-index.php', ['voitures' => $select]);
    }

    public function create()
    {
        $marque = new Marque;
        $selectMarque = $marque->select();

        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');

        Twig::render('voiture-create.php', ['marques' => $selectMarque]);
    }
    public function store()
    {

        $voiture = new Voiture;

        $fileImage = $_FILES['photo_path'];
        $uploadfile = UPLOAD_DIR . basename($fileImage['name']);
        $fileName = $fileImage['name'];
        $_POST['photo_path'] = $fileName;

        if (move_uploaded_file($fileImage['tmp_name'], $uploadfile)) {
            $insert = $voiture->insert($_POST);

            RequirePage::redirect('voiture');
        } else {
            RequirePage::redirect('voiture-create');
        }

        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');

        if ($insert) {
            RequirePage::redirect('voiture');
        } else {
            print_r($insert);
        }
        RequirePage::redirect('voiture');
    }
    public function show($id)
    {
        $voiture = new Voiture;
        $selectId = $voiture->selectId($id);
        $marque = new Marque;
        $selectMarque = $marque->selectId($selectId['marque_id']);

        if ($_SESSION) {
            $user = new User;
            $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
        }

        Twig::render('voiture-show.php', ['voiture' => $selectId, 'nom' => $selectMarque['nom']]);
    }
    public function edit($id)
    {
        $voiture = new Voiture;
        $selectId = $voiture->selectId($id);
        $marque = new Marque;
        $selectMarque = $marque->select();

        if ($_SESSION) {
            $user = new User;
            $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
        }


        Twig::render('voiture-edit.php', ['voiture' => $selectId, 'marques' => $selectMarque]);
    }

    public function update()
    {
        $fileImage = $_FILES['photo_path'];
        $uploadfile = UPLOAD_DIR . basename($fileImage['name']);
        $fileName = $fileImage['name'];
        $_POST['photo_path'] = $fileName;

        if (move_uploaded_file($fileImage['tmp_name'], $uploadfile)) {
            $voiture = new Voiture;
            $update = $voiture->update($_POST);

            RequirePage::redirect('voiture');
        } else {
            RequirePage::redirect('voiture-edit');
        }

        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');

    }
    public function destroy()
    {
        $voiture = new Voiture;
        $delete = $voiture->delete($_POST['id']);

        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');

        if ($delete) {
            RequirePage::redirect('voiture');
        } else {
            print_r($delete);
        }
    }
}
