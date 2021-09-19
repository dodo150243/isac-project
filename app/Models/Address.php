<?php namespace App\Models;

use CodeIgniter\Model;

class Address extends Model {
    protected $table = 'tbl_address';
    // protected $primaryKey = 'stu_id';
    protected $allowedFields = [
        'numhome_b',
        'village_b',
        'sub_distric_b',
        'district_b',
        'province_b',
        'zipcode_b',
        'numhome_c',
        'village_c',
        'sub_district_c',
        'district_c ',
        'province_c',
        'zipcode_c',
        ];
}