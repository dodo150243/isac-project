<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class StudentCrud_index extends Controller {
    // show names list
    public function index() {
        $UserModel = new UserModel();

        // โชว์ All จาก id 
        $data['users'] = $UserModel->orderBy('first_year', 'ASC')->findAll();

        // $data['users'] = $UserModel->fetch_data();
        return view('seach_page_index', $data);
    }




    public function fetch_data(){
        // $query = $this->db->get('stu_id');

        // $query = $this->db->query("SELECT * FROM `stu_data` ORDER BY id DESC");
        return $query;
    }

    
}