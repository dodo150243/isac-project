<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class StudentCrud extends Controller {
    // show names list
    public function index() {
        $UserModel = new UserModel();

        // โชว์ All จาก id 
        $data['users'] = $UserModel->orderBy('first_year', 'ASC')->findAll();

        // $data['users'] = $UserModel->fetch_data();
        return view('seach_page', $data);
    }







    
    public function fetch_data(){
        // $query = $this->db->get('stu_id');

        // $query = $this->db->query("SELECT * FROM `stu_data` ORDER BY id DESC");
        return $query;
    }

    

    // add data 
    public function store() {
        $UserModel = new UserModel();
        $data = [
            'stu_id' => $this->request->getVar('stu_id'),	
            'password' => $this->request->getVar('password'),	
            'name_prefix' => $this->request->getVar('name_prefix'),	
            'FName' => $this->request->getVar('FName'),	
            'LName' => $this->request->getVar('LName'),	
            'FName_eng' => $this->request->getVar('FName_eng'),	
            'LName_eng' => $this->request->getVar('LName_eng'),	
            'id_cardnumber' => $this->request->getVar('id_cardnumber'),	
            'faculty' => $this->request->getVar('faculty'),	
            'section_name' => $this->request->getVar('section_name'),
            'section_num' => $this->request->getVar('section_num'),
            'edu_level' => $this->request->getVar('edu_level'),
            'first_year' => $this->request->getVar('first_year'),	
            'd_m_y_birth' => $this->request->getVar('d_m_y_birth'),	
            'province_birth' => $this->request->getVar('province_birth'),	
            'nationality' => $this->request->getVar('nationality'),	
            'religion' => $this->request->getVar('religion'),	
            'blood_type' => $this->request->getVar('blood_type'),	
            'Address' => $this->request->getVar('Address'),	
            'SubDistrict' => $this->request->getVar('SubDistrict'),	
            'District' => $this->request->getVar('District'),
            'Province' => $this->request->getVar('Province'),
            'Zipcode' => $this->request->getVar('Zipcode'),
            'phone_number'=> $this->request->getVar('phone_number')
        ];
        $UserModel->insert($data);
        return $this->response->redirect(site_url('/seach_page'));
    }

    // filter data


    
}