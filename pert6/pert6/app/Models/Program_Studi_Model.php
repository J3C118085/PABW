<?php namespace App\Models;

use CodeIgniter\Models;

class Program_Studi_Model extends BaseController{

    private $table='prodi';

    public function get(){
        $db = \Config\Database::connect();

        return $db->table($this->table)->get();
    }
    
}


?>