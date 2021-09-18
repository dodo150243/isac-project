<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Job;
use App\Models\Address;
use App\Models\Alumni;
use App\Models\Education;
use App\Models\Social;

class Register extends Controller
{
    
    public function index()
    {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rues validation form
        $rules = [
            // !---------tbl_address------------------------
            'numhome_b' => 'required|min_length[9]|max_length[9]',
            'village_b' => 'required|min_length[9]|max_length[9]',
            'sub_distric_b' => 'required|min_length[9]|max_length[9]',
            'district_b' => 'required|min_length[9]|max_length[9]',
            'province_b' => 'required|min_length[9]|max_length[9]',
            'zipcode_b' => 'required|min_length[9]|max_length[9]',
            'numhome_c' => 'required|min_length[9]|max_length[9]',
            'village_c' => 'required|min_length[9]|max_length[9]',
            'sub_district_c' => 'required|min_length[9]|max_length[9]',
            'district_c ' => 'required|min_length[9]|max_length[9]',
            'province_c' => 'required|min_length[9]|max_length[9]',
            'zipcode_c' => 'required|min_length[9]|max_length[9]',
             // !---------tbl_social---------------------------
            'facebook' => 'required|min_length[9]|max_length[9]',
            'line' => 'required|min_length[9]|max_length[9]',
            'phone_number' => 'required|min_length[9]|max_length[9]',
            // !---------tbl_education--------------------------
            'education_level' => 'required|min_length[9]|max_length[9]',
            'year_first' => 'required|min_length[9]|max_length[9]',
            'year_finish' => 'required|min_length[9]|max_length[9]',
            'faculty' => 'required|min_length[9]|max_length[9]',
            'major' => 'required|min_length[9]|max_length[9]',
            'section' => 'required|min_length[9]|max_length[9]',
            // !---------tbl_job--------------------------------
            'occupation' => 'required|min_length[9]|max_length[9]',
            'start_date' => 'required|min_length[9]|max_length[9]',
            'company_name' => 'required|min_length[9]|max_length[9]',
            'company_address' => 'required|min_length[9]|max_length[9]',
            'contact' => 'required|min_length[9]|max_length[9]',
            // !---------alumni_user--------------------------------
            'stu_id' => 'required|min_length[9]|max_length[9]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[password]',
            'name_prefix' => 'required|max_length[10]',
            'alumni_fname' => 'required|min_length[3]|max_length[20]',
            'alumni_lname' => 'required|min_length[3]|max_length[20]',
            'alumni_fname_eng' => 'required|min_length[3]|max_length[20]',
            'alumni_lname_eng' => 'required|min_length[3]|max_length[20]',
            'alumni_code' => 'required|min_length[13]|max_length[13]',
            'sex' => 'required|min_length[13]|max_length[13]',
            'd_m_y_birth' => 'required|min_length[3]|max_length[20]',
            'province_birth' => 'required|min_length[3]|max_length[20]',
            'nationality' =>  'required|min_length[3]|max_length[20]',
            'religion' => 'required|min_length[3]|max_length[20]',
            'blood_type' => 'required|min_length[1]|max_length[2]',
        ];
        if ($this->validate($rules)) {
            $model = new UserModel();
            $model = new Alumni();
            $model = new Address();
            $model = new Education();
            $model = new Social();
            $model = new Job();
            $data = [
                'stu_id' => $this->request->getVar('stu_id'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
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
                'phone_number' => $this->request->getVar('phone_number'),
            ];


            $model->save($data); 
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
    
   
}
