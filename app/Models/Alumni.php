<?php namespace App\Models;

use CodeIgniter\Model;

class Alumni extends Model {
    protected $table = 'alumni_user';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
            'stu_id',
            'password',
            'confpassword',
            'name_prefix',
            'alumni_fname',
            'alumni_lname' ,
            'alumni_fname_eng',
            'alumni_lname_eng',
            'alumni_code',
            'sex',
            'd_m_y_birth',
            'province_birth',
            'nationality',
            'religion',
            'blood_type'
        ];
}