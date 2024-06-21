<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $allowedFields = ['name','email','password','DOB', 'gender', 'verify_token', 'created_at'];
}