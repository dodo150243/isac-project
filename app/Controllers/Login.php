<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        // include helper form
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $stu_id = $this->request->getVar('stu_id');
        $password = $this->request->getVar('password');
        $data = $model->where('stu_id', $stu_id)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_password = password_verify($password, $pass);
            if ($verify_password) {
                $ses_data = [
                    'stu_id' => $data['stu_id'],
                    'name_prefix' => $data['name_prefix'],
                    'FName' => $data['FName'],
                    'LName' => $data['LName'],
                    'FName_eng' => $data['FName_eng'],
                    'LName_eng' => $data['LName_eng'],
                    'id_cardnumber' => $data['id_cardnumber'],
                    'faculty' => $data['faculty'],
                    'section_name' => $data['section_name'],
                    'section_num' => $data['section_num'],
                    'edu_level' => $data['edu_level'],
                    'first_year' => $data['first_year'],
                    'd_m_y_birth' => $data['d_m_y_birth'],
                    'province_birth' => $data['province_birth'],
                    'nationality' => $data['nationality'],
                    'religion' => $data['religion'],
                    'blood_type' => $data['blood_type'],
                    'Address' => $data['Address'],
                    'SubDistrict' => $data['SubDistrict'],
                    'District' => $data['District'],
                    'Province' => $data['Province'],
                    'Zipcode' => $data['Zipcode'],
                    'phone_number' => $data['phone_number'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/index');
            } else {
                $session->setFlashdata('msg', 'Wrong password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}