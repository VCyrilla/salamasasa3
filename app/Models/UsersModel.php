<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $allowedFields = ['name','email','password', 'verify_token','verify_status', 'role'];
}