<?php

require_once('Crud.php');
class Logbook extends Crud
{
    public $table = 'logbook';
    public $primaryKey = 'id';
    public $fillable = [
        'user_id',
        'ip_address',
        'visited_page',
        'timestamp',
    ];
    
    public function addLogEntry($user_id, $ip_address, $visited_page, $timestamp)
    {
        $data = [
            'user_id' => $user_id,
            'ip_address' => $ip_address,
            'visited_page' => $visited_page,
            'timestamp' => $timestamp,
        ];
        
        return $this->insert($data);
    }
}