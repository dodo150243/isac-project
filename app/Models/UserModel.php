<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'stu_data';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'stu_id','password',
        'name_prefix','FName',
        'LName','FName_eng',
           'LName_eng','id_cardnumber',
           'faculty','section_name',
           'section_num','edu_level',
           'first_year','d_m_y_birth',
           'province_birth','nationality',
           'religion','blood_type','Address',
           'SubDistrict','District','Province',
           'Zipcode','phone_number'
        ];
}