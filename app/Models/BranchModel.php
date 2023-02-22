<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tblbranches';
    protected $primaryKey       = 'BrID';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['BrName'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'BrCreatedAt';
    protected $updatedField  = 'BrUpdatedAt';
    protected $deletedField  = 'BrDeletedAt';

    // Validation
    protected $validationRules = [
        'BrName' =>  'required|is_unique[tblbranches.BrName,BrID,{BrID}]'
    ];

    protected $validationMessages   = [
        'BrName' => [
            'required' => 'Branch name is required.',
            'is_unique' => 'This branch name is already in use.'
        ]
    ];
}
