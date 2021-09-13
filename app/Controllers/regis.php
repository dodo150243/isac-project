<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller {
    public function index() {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save() {
        // include helper form
        helper(['form']);
        // set rules validation form
        $rules = [
            'stuID' => 'required|min_length[3]|max_length[50]',
            'fname' => 'required|min_length[3]|max_length[50]',
            'lname' => 'required|min_length[3]|max_length[50]',
            'FnEng' => 'required|min_length[3]|max_length[50]',
            'LnEng' => 'required|min_length[3]|max_length[50]',
            'Password' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[Password]',
        ];
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'stuId' => $this->request->getVar('stuID'),
                'FName' => $this->request->getVar('fname'),
                'LName' => $this->request->getVar('lname'),
                'FName_eng' => $this->request->getVar('FnEng'),
                'LName_eng' => $this->request->getVar('LnEng'),
                'password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}