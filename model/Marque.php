<?php
require_once('Crud.php');

class Marque extends Crud {
    public $table = 'marque';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'nom'
    ];
}

?>