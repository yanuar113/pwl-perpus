<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['email', 'password', 'nama'];
    protected $returnType    = 'array';
 
}
