<?php namespace App\Database\Seeds;

class ProductSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'product_code'=>'1q2w3e',
            'product_name'=>'T-Shirt',
            'purchase_price'=>0,
            'sale_price'=>0,
            'stock'=>0,
            'product_description'=>'All Size'
        ];
        $data2 = [
            'product_code'=>'4e5r6t',
            'product_name'=>'Hoodie',
            'purchase_price'=>0,
            'sale_price'=>0,
            'stock'=>0,
            'product_description'=>'All Size'
        ];

        $this->db->table('products')->insert($data1);
        $this->db->table('products')->insert($data2);
    }
}