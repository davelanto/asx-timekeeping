<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tblemployeesdesignation';
    protected $primaryKey       = 'EdID';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['EdName'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'EdCreatedAt';
    protected $updatedField  = 'EdUpdatedAt';
    protected $deletedField  = 'EdDeletedAt';
}
