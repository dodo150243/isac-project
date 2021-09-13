<?php  namespace App\Controllers;
use App\Models\StudentModel;
use CodeIgniter\Controller;

class Profile extends Controller{
    public function index() {
       
        $StudentModel = new StudentModel();

        // โชว์ All จาก id 
        $data['users'] = $StudentModel->orderBy('stu_id', 'DESC')->findAll();

        // $data['users'] = $StudentModel->fetch_data();
        return view('profile', $data);
    }
}