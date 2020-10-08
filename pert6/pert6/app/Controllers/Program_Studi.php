<?php

namespace App\Controllers;
use App\Models\Program_Studi_m;

class Program_Studi extends BaseController{

    public function _construt(){
      parent::_construct();

      $this->prodi = new Program_Studi_Model();
    }

    public function index(){
        $db = \Config\Database::connect();

        $data['dataProdi'] = $this->prodi->get()->getresult();

        echo view('header_v');
        echo view('program_studi_v', $data);
        echo view('footer_v.php');
    }

    public function add(){
        
    }
}

?>