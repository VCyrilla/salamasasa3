<?php

namespace App\Models;

use CodeIgniter\Model;
class DoctorsModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $allowedFields = ['name','email','password', 'role', 'specialisation'];
}

