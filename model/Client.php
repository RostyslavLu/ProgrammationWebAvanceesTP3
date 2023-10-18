<?php
require_once('Crud.php');

class Client extends Crud {
    public $table = 'client';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'nom',
        'addresse',
        'courriel',
        'phone',
        'ville_id'
    ];
}