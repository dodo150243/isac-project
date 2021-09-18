<?php namespace App\Models;

use CodeIgniter\Model;

class Job extends Model {
    protected $table = 'tbl_job';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'occupation' ,
            'start_date',
            'company_name',
            'company_address',
            'contact'
        ];
}