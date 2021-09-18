<?php namespace App\Models;

use CodeIgniter\Model;

class Img extends Model {
    protected $table = 'tbl_img';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'imges'
    ];
}