<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'patientID';
    protected $allowedFields = ['name','email','password','DOB', 'gender', 'verify_token', 'created_at'];
}