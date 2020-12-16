<?php namespace App\Models;

use CodeIgniter\Model;

class SaleDetail_model extends Model
{
    protected $table = 'trx_sale_details';

    public function getSaleDetail($id)
    {
        return $this->db->table($this->table)->join('trx_sales', 'trx_sales.trx_sale_id = trx_sale_details.trx_sale_id', 'CASCADE', 'CASCADE')->join('products', 'products.product_id = trx_sale_details.product_id', 'CASCADE', 'CASCADE', 'full')->where('trx_sale_details.trx_sale_id', $id)->get()->getResultArray();
    }
    public function insertSaleDetail($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deleteSaleDetail($id)
    {
        return $this->db->table($this->table)->delete(['sale_detail_id'=>$id]);
    }

}