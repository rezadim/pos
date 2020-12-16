<?php namespace App\Models;

use CodeIgniter\Model;

class PurchaseDetail_model extends Model
{
    protected $table = 'trx_purchase_details';

    public function getPurchaseDetail($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->join('trx_purchases', 'trx_purchases.trx_purchase_id = trx_purchase_details.trx_purchase_id', 'CASCADE', 'CASCADE')->join('products', 'products.product_id = trx_purchase_details.product_id', 'CASCADE', 'CASCADE')->get()->getResultArray();
        }else{
            return $this->db->table($this->table)->join('trx_purchases', 'trx_purchases.trx_purchase_id = trx_purchase_details.trx_purchase_id', 'CASCADE', 'CASCADE')->join('products', 'products.product_id = trx_purchase_details.product_id', 'CASCADE', 'CASCADE')->where('trx_purchase_details.trx_purchase_id', $id)->get()->getResultArray();
        }
    }
    public function insertPurchaseDetail($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deletePurchaseDetail($id)
    {
        return $this->db->table($this->table)->delete(['purchase_detail_id'=>$id]);
    }


}