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
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'EdCreatedAt';
    protected $updatedField  = 'EdUpdatedAt';
    protected $deletedField  = 'EdDeletedAt';

    // Validation
    protected $validationRules = [
        'EdName' =>  'required|is_unique[tblemployeesdesignation.EdName,EdID,{EdID}]'
    ];

    protected $validationMessages   = [
        'EdName' => [
            'required' => 'Designation name is required.',
            'is_unique' => 'This designation name is already existing.'
        ]
    ];
}
