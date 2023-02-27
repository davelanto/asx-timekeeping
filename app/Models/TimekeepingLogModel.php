<?php

namespace App\Models;

use CodeIgniter\Model;

class TimekeepingLogModel extends Model
{
    protected $table            = 'tbltimekeepinglogs';
    protected $primaryKey       = 'TklID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'TklEmID', 'TklLog', 'TklStatus', 'TklCreatedAt'
    ];


    public function get($search)
    {

        return
            $this->select('CONCAT(tblemployees.EmFirstName, " ", tblemployees.EmLastName) as name, tblemployees.EmAltID,
            tbldepartments.DeName, tbltimekeepinglogs.TklStatus, tbltimekeepinglogs.TklLog, tblbranches.BrName')
                ->join('tblemployees', 'tbltimekeepinglogs.TklEmID = tblemployees.EmID')
                ->join('tbldepartments', 'tblemployees.EmDeID = tbldepartments.DeID')
                ->join('tblbranches', 'tblemployees.EmBrID = tblbranches.BrID')
                ->like('tblemployees.EmAltID', "$search", 'both')
                ->orLike('tblemployees.EmFirstName', "$search", 'both')
                ->orLike('tblemployees.EmLastName', "$search", 'both')
                ->orLike('tblbranches.BrName', "$search", 'both')
                ->orLike('tbldepartments.DeName', "$search", 'both')
                ->orderBy('tbltimekeepinglogs.TklID', 'DESC')
                ->withDeleted()
                ->paginate(10, 'timekeepinglogs');
    }

    public function getEmployeebyID($id)
    {
        return
            $this->db->table('tbltimekeepinglogs a')
                ->join('tblemployees b', 'a.TklEmID = b.EmID', 'INNER')
                ->join('tblbranches c', 'b.EmBrID = c.BrID', 'INNER')
                ->join('tbldepartments d', 'b.EmDeID = d.DeID', 'INNER')
                ->join('tblemployeesdesignation e', 'b.EmEdID = e.EdID', 'INNER')
                ->where('b.EmAltID', $id)
                ->orderBy('a.TklID', 'DESC')
                ->limit(6)
                ->get()
                ->getResultObject();
    }

    public function getRecordTodayByEmployeeID($id){
        return
            $this->db->table('tbltimekeepinglogs a')
                ->join('tblemployees b', 'a.tklEmID = b.EmID', 'INNER')
                ->where('b.EmAltID', "$id")
                ->where('DATE(a.TklCreatedAt)', date('Y-m-d'))
                ->orderBy('a.TklID', 'DESC')
                ->limit(1)
                ->get()
                ->getResultObject();
    }
}
