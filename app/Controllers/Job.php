<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JobModelModel;

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
            
            'Occupation' => 'required|min_length[5]|max_length[200]',
            'startDate' => 'required|min_length[5]|max_length[200]',
            'Company' => 'required|min_length[5]|max_length[200]',
            'CompanyAdd' => 'required|min_length[5]|max_length[200]',
            'contect' => 'required|min_length[5]|max_length[200]',
            
            
        ];
        if($this->validate($rules)){
            $model = new JobModelModel();
            $data = [
            'Occupation' =>$this->request->getVar('Occupation'),
            'startDate' => $this->request->getVar('startDate'),
            'Company' => $this->request->getVar('Company'),
            'CompanyAdd' => $this->request->getVar('CompanyAdd'),
            'contect' => $this->request->getVar('contect'),    
            ];
            
            
                $model->save($data);
                return redirect()->to('/job');
                
                
            }
            // else{
            //     $data['validation'] = $this->validator;
            //     echo view('register', $data);
            // }
            
}
}