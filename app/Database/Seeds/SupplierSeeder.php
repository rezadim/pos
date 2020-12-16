<?php namespace App\Database\Seeds;

class SupplierSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'supplier_name'=>'Dimas',
            'supplier_phone_number'=>'0987654321',
            'supplier_address'=>'Sukoharjo, Jawa Tengah'
        ];
        $data2 = [
            'supplier_name'=>'Putra',
            'supplier_phone_number'=>'09876654323',
            'supplier_address'=>'Sukoharjo, Jawa Tengah'
        ];

        $this->db->table('suppliers')->insert($data1);
        $this->db->table('suppliers')->insert($data2);
    }
}