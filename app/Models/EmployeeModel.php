<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tblemployees';
    protected $primaryKey       = 'EmID';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['EmAltID', 'EmFirstName', 'EmLastName',
        'EmBrID', 'EmDeID', 'EmEdID', 'EmID', 'EmDeletedAt'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'EmCreatedAt';
    protected $updatedField  = 'EmUpdatedAt';
    protected $deletedField  = 'EmDeletedAt';

    // Validation
    protected $validationRules = [
        'EmAltID' =>  'required|alpha_numeric|min_length[6]|is_unique[tblemployees.EmAltID,EmID,{EmID}]',
        'EmFirstName' => 'required',
        'EmLastName' => 'required',
        'EmBrID' => 'required|numeric',
        'EmDeID' => 'required|numeric',
        'EmEdID' => 'required|numeric'
    ];

    protected $validationMessages   = [
        'EmAltID' => [
            'is_unique' => 'Employee ID is already in use.',
            'required' => 'Employee ID is required',
            'min_length' => 'Your Employee ID must a least 6 alphanumerical.',
            'alpha_numeric' => 'Your Employee ID may only contain alphabetical characters and numeric.'
        ],
        'EmFirstName' => [
            'required' => 'Your first name is required.'
        ],
        'EmLastName' => [
            'required' => 'Your last name is required.'
        ],
        'EmBrID' => [
            'required' => 'Please choose branch.'
        ],
        'EmDeID' => [
            'required' => 'Please choose department.'
        ],
        'EmEdID' => [
            'required' => 'Please choose designation.'
        ]

    ];

    public function get($search)
    {
        return $this
            ->select('tblemployees.EmID ,tblemployees.EmAltID, tblemployees.EmFirstName, 
             tblemployees.EmLastName, tblbranches.BrName, tbldepartments.DeName, tblemployeesdesignation.EdName,
             tblemployees.EmCreatedAt, tblemployees.EmUpdatedAt, tblemployees.EmDeletedAt')
            ->join('tblbranches', 'tblemployees.EmBrID = tblbranches.BrID', 'INNER')
            ->join('tbldepartments', 'tbldepartments.DeID = tblemployees.EmDeID', 'INNER')
            ->join('tblemployeesdesignation', 'tblemployeesdesignation.EdID = tblemployees.EmEdID', 'INNER')
            ->like('tblemployees.EmAltID', "$search", 'both')
            ->orLike('tblemployees.EmAltID', "$search", 'both')
            ->orLike('tblemployees.EmFirstName', "$search", 'both')
            ->orLike('tblemployees.EmLastName', "$search", 'both')
            ->orLike('tblbranches.BrName', "$search", 'both')
            ->orLike('tbldepartments.DeName', "$search", 'both')
            ->orLike('tblemployeesdesignation.EdName', "$search", 'both')
            ->orderBy('tblemployees.EmID', 'DESC')
            ->paginate(10, 'employee');
    }
}
