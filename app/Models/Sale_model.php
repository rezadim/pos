<?php namespace App\Models;

use CodeIgniter\Model;

class Sale_model extends Model
{
    protected $table = 'trx_sales';

    public function getSale($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->get()->getResultArray();
        }else{
            return $this->db->table($this->table)->where('trx_sale_id', $id)->get()->getRowArray();
        }
    }
    public function insertSale($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deleteSale($id)
    {
        return $this->db->table($this->table)->delete(['trx_sale_id'=>$id]);
    }


}