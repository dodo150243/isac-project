<?php  namespace App\Controllers;

use CodeIgniter\Controller;

class Web extends Controller{
    public function index() {
       
        echo view('web');
    }
}