<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller{
    public function index() {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

public function save(){
//include helper form
helper(['form']);
//set rues validation form
$rules = [
    'stu_id' =>'required|min_length[9]|max_length[9]',
    'password' => 'required|min_length[6]|max_length[200]',
    'confpassword' => 'matches[password]',
    'name_prefix' => 'required|max_length[10]',
    'FName' => 'required|min_length[3]|max_length[20]',
    'LName' => 'required|min_length[3]|max_length[20]',
    'FName_eng' => 'required|min_length[3]|max_length[20]',
    'LName_eng' => 'required|min_length[3]|max_length[20]',
    'id_cardnumber' => 'required|min_length[13]|max_length[13]',
    'faculty' => 'required|min_length[3]|max_length[100]',
    'section_name' => 'required|min_length[3]|max_length[20]',
    'section_num' => 'required|min_length[3]|max_length[20]',
    'edu_level' => 'required|max_length[100]',
    'first_year' => 'required|min_length[4]|max_length[4]',
    'd_m_y_birth' => 'required|min_length[3]|max_length[20]',
    'province_birth' => 'required|min_length[3]|max_length[20]',
    'nationality' =>  'required|min_length[3]|max_length[20]',
    'religion' => 'required|min_length[3]|max_length[20]',
    'blood_type' => 'required|min_length[1]|max_length[2]',
    'Address' => 'required|min_length[1]|max_length[20]',
    'SubDistrict' => 'required|min_length[3]|max_length[20]',
    'District' => 'required|min_length[3]|max_length[20]',
    'Province' => 'required|min_length[3]|max_length[20]',
    'Zipcode' => 'required|min_length[5]|max_length[5]',
    'phone_number' => 'required|min_length[10]|max_length[10]',
];
if($this->validate($rules)){
$model = new UserModel();
$data = [
    'stu_id' =>$this->request->getVar('stu_id'),
    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    'name_prefix' =>$this->request->getVar('name_prefix'),
    'FName' =>$this->request->getVar('FName'),
    'LName' =>$this->request->getVar('LName'),
    'FName_eng' =>$this->request->getVar('FName_eng'),
    'LName_eng' =>$this->request->getVar('LName_eng'),
    'id_cardnumber' =>$this->request->getVar('id_cardnumber'),
    'faculty' =>$this->request->getVar('faculty'),
    'section_name' =>$this->request->getVar('section_name'),
    'section_num' =>$this->request->getVar('section_num'),
    'edu_level' =>$this->request->getVar('edu_level'),
    'first_year' =>$this->request->getVar('first_year'),
    'd_m_y_birth' =>$this->request->getVar('d_m_y_birth'),
    'province_birth' =>$this->request->getVar('province_birth'),
    'nationality' =>$this->request->getVar('nationality'),
    'religion' =>$this->request->getVar('religion'),
    'blood_type' =>$this->request->getVar('blood_type'),
    'Address' =>$this->request->getVar('Address'),
    'SubDistrict' =>$this->request->getVar('SubDistrict'),
    'District' =>$this->request->getVar('District'),
    'Province' =>$this->request->getVar('Province'),
    'Zipcode' =>$this->request->getVar('Zipcode'),
    'phone_number' =>$this->request->getVar('phone_number'),
];


    $model->save($data);
    return redirect()->to('/login');
    
    
}else{
    $data['validation'] = $this->validator;
    echo view('register', $data);
}

}
}