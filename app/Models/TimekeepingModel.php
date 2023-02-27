<?php

namespace App\Models;

use CodeIgniter\Model;

class TimekeepingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbltimekeeping';
    protected $primaryKey       = 'TkID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'TkEmID', 'TkTimeIn', 'TkTimeOut', 'TkBreakIn', 'TkBreakOut', 'TkOtIn',
        'TkOtOut'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'TkCreatedAt';
    protected $updatedField  = 'TkUpdatedAt';


    public function get($id){

        $builder = $this->db->table('tbltimekeeping a');
        $builder->select('b.EmAltID, CONCAT(b.EmFirstName, " ", b.EmLastName) as name, a.TkTimeIn, a.TkTimeOut, a.TkBreakIn, a.TkBreakOut, a.tkOtIn, a.TkOtOut');
        $builder->join('tblemployees b', 'a.TkEmID = b.EmID', 'INNER');
    }


}
