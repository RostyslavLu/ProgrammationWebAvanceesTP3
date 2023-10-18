<?php
RequirePage::model('Client');
RequirePage::model('Ville');
RequirePage::model('User');
class ControllerClient extends Controller{

    public function index() {
        
        $client = new Client;
        $select = $client->select();
        $user = new User;
        $user->addToLogbook($_SESSION['user_id'], $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], 'NOW()');
        Twig::render('client-index.php', ['clients'=>$select]);

    }
    public function create(){
        $ville = new Ville;
        $selectVille = $ville->select();

        Twig::render('client-create.php', ['villes'=>$selectVille]);
    }
    public function store(){
        //$ville = new Ville;
        //$insertVille = $ville->insert($_POST);
        //
        //$_POST['ville_id'] = $insertVille;

        $client = new Client;
        $insert = $client->insert($_POST);

        RequirePage::redirect('client');
    }
    public function show($id){
        $client = new Client;
        $selectId = $client->selectId($id);
        $ville = new Ville;
        $selectVille = $ville->selectId($selectId['ville_id']);

        Twig::render('client-show.php', ['client' => $selectId, 'ville' => $selectVille['ville']]);
    }
    public function edit($id) {
        $client = new Client;
        $selectId = $client->selectId($id);
        $ville = new Ville;
        $selectVille = $ville->select();

        Twig::render('client-edit.php', ['client' => $selectId, 'villes' => $selectVille]);
    }

    public function update(){
        $client = new Client;
        $update = $client->update($_POST);
        
        if ($update) {
            RequirePage::redirect('client');
         } else {
            print_r($update);
         }
        
    }
    public function destroy() {
        $client = new Client;
        $delete = $client->delete($_POST['id']);
        if ($delete) {
            RequirePage::redirect('client');
        } else {
            print_r($delete);
        }
    }
}

?>