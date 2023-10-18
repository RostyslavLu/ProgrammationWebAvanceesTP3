<?php
require_once('Crud.php');

class Ville extends Crud {
    public $table = 'ville';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'ville'
    ];
}

?>