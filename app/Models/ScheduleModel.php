<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tblschedules';
    protected $primaryKey       = 'ScID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ScEmID', 'ScTimeIn', 'ScTimeOut', 'ScCreatedAt', 'ScUpdatedAt'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'ScCreatedAt';
    protected $updatedField  = 'ScUpdatedAt';
    protected $deletedField  = 'ScDeletedAt';

    // Validation
    protected $validationRules      = [
        'csvFile' => 'uploaded[csvFile]|max_size[csvFile,2048]|ext_in[csvFile,csv]',
        'ScEmID' => 'required',
        'ScTimeIn' => 'required',
        'ScTimeOut' => 'required'
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function get($from, $to, $search)
    {
        $where = "DATE(tblschedules.ScTimeIn) BETWEEN '$from' AND '$to'";
        return
            $this->table('tblschedules')
                ->select('tblschedules.ScID, tblschedules.ScTimeIn, tblschedules.ScTimeOut, tblschedules.ScCreatedAt, 
                tblemployees.EmAltID, CONCAT(tblemployees.EmFirstName, " ", tblemployees.EmLastName) as name')
                ->join('tblemployees', 'tblschedules.ScEmID = tblemployees.EmID', 'INNER')
                ->orwhere($where)
                ->orLike('tblemployees.EmFirstName', "$search")
                ->orderBy('tblschedules.ScID', 'DESC')
                ->paginate(10, 'schedule');
    }

    public function store($data)
    {
        $builder = $this->db->table('tblschedules');
        return $builder->insertBatch($data);
    }

    public function remove($id)
    {
        $builder = $this->db->table('tblschedules');
        $builder->delete(['ScID' => $id]);
    }

}
