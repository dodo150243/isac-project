<?php

namespace App\Controllers;

use CodeIgniter\Controller;
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
            'sex' => 'required|max_length[10]',
            'd_m_y_birth' => 'required|min_length[3]|max_length[20]',
            'province_birth' => 'required|min_length[3]|max_length[20]',
            'nationality' =>  'required|min_length[3]|max_length[20]',
            'religion' => 'required|min_length[3]|max_length[20]',
            'blood_type' => 'required|min_length[1]|max_length[2]',
            // !---------tbl_address------------------------
            'numhome_b' => 'required|max_length[10]',
            'village_b' => 'required|max_length[10]',
            'sub_distric_b' => 'required|min_length[3]|max_length[20]',
            'district_b' => 'required|min_length[3]|max_length[20]',
            'province_b' => 'required|min_length[3]|max_length[20]',
            'zipcode_b' => 'required|min_length[5]|max_length[5]',
            'numhome_c' => 'required|max_length[10]',
            'village_c' => 'required|max_length[10]',
            'sub_district_c' => 'required|min_length[3]|max_length[20]',
            'district_c' => 'required|min_length[3]|max_length[20]',
            'province_c' => 'required|min_length[3]|max_length[20]',
            'zipcode_c' => 'required|min_length[5]|max_length[5]',
            // !---------tbl_social---------------------------
            'facebook' => 'required|min_length[2]|max_length[20]',
            'line' => 'required|min_length[3]|max_length[20]',
            'phone_number' => 'required|min_length[9]|max_length[10]',
            // !---------tbl_education--------------------------
            'education_level' => 'required|min_length[2]|max_length[50]',
            'year_first' => 'required|min_length[3]|max_length[10]',
            'year_finish' => 'required|min_length[3]|max_length[10]',
            'faculty' => 'required|min_length[3]|max_length[50]',
            'major' => 'required|min_length[3]|max_length[50]',
            'section' => 'required|min_length[2]|max_length[20]',
            // !---------tbl_job--------------------------------
            'occupation' => 'required|max_length[50]',
            'start_date' => 'required|min_length[2]|max_length[50]',
            'company_name' => 'required|min_length[2]|max_length[50]',
            'company_address' => 'required|min_length[2]|max_length[200]',
            'contact' => 'required|min_length[9]|max_length[10]',


        ];
        if ($this->validate($rules)) {

            $model = new Alumni();
            $model2 = new Address();
            $model3 = new Education();
            $model4 = new Social();
            $model5 = new Job();



            $dataAlumni = [
                'stu_id' => $this->request->getVar('stu_id'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name_prefix' => $this->request->getVar('name_prefix'),
                'alumni_fname' => $this->request->getVar('alumni_fname'),
                'alumni_lname' => $this->request->getVar('alumni_lname'),
                'alumni_fname_eng' => $this->request->getVar('alumni_fname_eng'),
                'alumni_lname_eng' => $this->request->getVar('alumni_lname_eng'),
                'alumni_code' => $this->request->getVar('alumni_code'),
                'sex' => $this->request->getVar('sex'),
                'd_m_y_birth' => $this->request->getVar('d_m_y_birth'),
                'province_birth' => $this->request->getVar('province_birth'),
                'nationality' => $this->request->getVar('nationality'),
                'religion' => $this->request->getVar('religion'),
                'blood_type' => $this->request->getVar('blood_type'),
                
            ];
            $model->save($dataAlumni);
    
            $dataAddress = [
                'numhome_b' => $this->request->getVar('numhome_b'),
                'village_b' => $this->request->getVar('village_b'),
                'sub_distric_b' => $this->request->getVar('sub_distric_b'),
                'district_b' => $this->request->getVar('district_b'),
                'province_b' => $this->request->getVar('province_b'),
                'zipcode_b' => $this->request->getVar('zipcode_b'),
                'numhome_c' => $this->request->getVar('numhome_c'),
                'village_c' => $this->request->getVar('village_c'),
                'sub_district_c' => $this->request->getVar('sub_district_c'),
                'district_c' => $this->request->getVar('district_c'),
                'province_c' => $this->request->getVar('province_c'),
                'zipcode_c' => $this->request->getVar('zipcode_c'),
                
            ];
            $model2->save($dataAddress);
            

            $dataEducation = [
                'education_level' => $this->request->getVar('education_level'),
                'year_first' => $this->request->getVar('year_first'),
                'year_finish' => $this->request->getVar('year_finish'),
                'faculty' => $this->request->getVar('faculty'),
                'major' => $this->request->getVar('major'),
                'section' => $this->request->getVar('section'),
                
            ];
            $model3->save($dataEducation);
           

            $dataSocial = [
                'facebook' => $this->request->getVar('facebook'),
                'line' => $this->request->getVar('line'),
                'phone_number' => $this->request->getVar('phone_number'),
                
            ];
            $model4->save($dataSocial);
            

            $dataJob = [
                'occupation' => $this->request->getVar('occupation'),
                'start_date' => $this->request->getVar('start_date'),
                'company_name' => $this->request->getVar('company_name'),
                'company_address' => $this->request->getVar('company_address'),
                'contact' => $this->request->getVar('contact'),
               
            ];
            $model5->save($dataJob);
            

            


            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
