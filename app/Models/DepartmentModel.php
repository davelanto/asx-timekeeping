<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbldepartments';
    protected $primaryKey       = 'DeID';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['DeName'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'DeCreatedAt';
    protected $updatedField  = 'DeUpdatedAt';
    protected $deletedField  = 'DeDeletedAt';
}
