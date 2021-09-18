<?php namespace App\Models;

use CodeIgniter\Model;

class Education extends Model {
    protected $table = 'tbl_education';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'education_level',
            'year_first',
            'year_finish',
            'faculty',
            'major',
            'section'
        ];
}