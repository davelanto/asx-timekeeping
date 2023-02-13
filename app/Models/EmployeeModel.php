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
        'EmBrID', 'EmDeID', 'EmEdID', ''];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'EmCreatedAt';
    protected $updatedField  = 'EmUpdatedAt';
    protected $deletedField  = 'EmDeletedAt';

    // Validation
    protected $validationRules      = [
        'EmAltID' =>  'required|alpha_numeric|min_length[6]|is_unique[tblemployees.EmAltID]',
        'EmFirstName' => 'required|alpha_space',
        'EmLastName' => 'required|alpha_space',
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
            'alpha_space' => 'Your first name may only contain alphabetical characters and spaces.',
            'required' => 'Your first name is required.'
        ],
        'EmLastName' => [
            'alpha_space' => 'Your last name may only contain alphabetical characters and spaces.',
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

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getEmployees()
    {
        $builder = $this->db->table('tblemployees a');
        $builder->select('a.EmAltID, a.EmFirstName, a.EmLastName, b.BrName, c.DeName, d.EdName, a.EmCreatedAt, a.EmUpdatedAt, a.EmDeletedAt');
        $builder->join('tblbranches b', 'a.EmBrID = b.BrID', 'INNER');
        $builder->join('tbldepartments c', 'c.DeID = a.EmDeID', 'INNER');
        $builder->join('tblemployeesdesignation d', 'd.EdID = a.EmEdID', 'INNER');
        $builder->orderBy('a.EmID', 'DESC');
        $query = $builder->get();

        return $query->getResult();

    }
}
