<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Seachdata extends Controller{
public function seach() {
        $UserModel = new UserModel();

        // โชว์ All จาก id 
        $data['users'] = $UserModel->orderBy('first_year', 'ASC')->findAll();

        // $data['users'] = $UserModel->fetch_data();
        return view('seach_page', $data);
    }
    // if(isset($_POST["submit"])){
    //     echo ('<h1>มาวะ</h1>');
    // }
}

?>