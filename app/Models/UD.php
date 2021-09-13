<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'stu_data';
    protected $allowedFields = [
        'stuId',
         'FName',
          'LName',
           'FName_eng',
           'LName_eng',
           'password',
        ];
}