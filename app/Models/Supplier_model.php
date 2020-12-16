<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_model extends Model
{
    protected $table = 'suppliers';

    public function getSupplier($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->get()->getResultArray();
        }else{
            return $this->db->table($this->table)->where(['supplier_id'=>$id])->get()->getRowArray();
        }
    }
    public function insertSupplier($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updateSupplier($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['supplier_id'=>$id]);
    }
    public function deleteSupplier($id)
    {
        return $this->db->table($this->table)->delete(['supplier_id'=>$id]);
    }


}