<?php namespace App\Models;

use CodeIgniter\Model;

class Social extends Model {
    protected $table = 'tbl_social';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'facebook',
        'line',
        'phone_number'
        ];
}