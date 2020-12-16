<?php namespace App\Models;

use CodeIgniter\Model;

class Purchase_model extends Model
{
    protected $table = 'trx_purchases';

    public function getPurchase($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->join('suppliers', 'suppliers.supplier_id = trx_purchases.supplier_id', 'CASCADE', 'cascade')->get()->getResultArray();
        }else{
            return $this->db->table($this->table)->join('suppliers', 'suppliers.supplier_id = trx_purchases.supplier_id', 'CASCADE', 'CASCADE')->where(['trx_purchases.trx_purchase_id'=>$id])->get()->getRowArray();
        }
    }
    public function insertPurchase($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deletePurchase($id)
    {
        return $this->db->table($this->table)->delete(['purchase_id'=>$id]);
    }

}
