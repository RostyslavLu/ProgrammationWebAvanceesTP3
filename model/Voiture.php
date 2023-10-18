<?php
require_once('Crud.php');

class Voiture extends Crud {
    public $table = 'voitures';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'annee',
        'prix_par_jour',
        'disponible',
        'photo_path',
        'marque_id'
    ];
}